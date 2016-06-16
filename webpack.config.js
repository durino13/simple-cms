// TODO Move this content into gulp file ..

var webpack = require('webpack');

module.exports = {
    entry: {
        'filename': './resources/assets/js/common.js'
    },
    output: {
        'path': 'public/js',
        'publicPath': '/js/',
        'filename': 'all.js'
    },
    module: {
        loaders: [

            // Style loaders
            {   test: /\.css$/, loader: "style!css" },
            {
                test: /\.less$/,
                loader: "style!css!less"
            },
            {
                test: /\.scss$/,
                loader: "style!css!sass"
            },

            // Picture loaders
            {
                test: /\.(jpe?g|png|gif|svg)$/i,
                loaders: [
                    'file?hash=sha512&digest=hex&name=[hash].[ext]',
                    'image-webpack?bypassOnDebug&optimizationLevel=7&interlaced=false'
                ]
            },

            // Font loaders
            {
                test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/, loader: "file-loader"
            },
            {
                test: /\.woff(\?.*)?$/,
                loader: "url?limit=10000&mimetype=application/font-woff"
            }, {
                test: /\.woff2(\?.*)?$/,
                loader: "url?limit=10000&mimetype=application/font-woff"
            }, {
                test: /\.ttf(\?.*)?$/,
                loader: "url?limit=10000&mimetype=application/octet-stream"
            }, {
                test: /\.eot(\?.*)?$/,
                loader: "file"
            }, {
                test: /\.svg(\?.*)?$/,
                loader: "url?limit=10000&mimetype=image/svg+xml"
            },

            // TinyMCE shimming ..
            {
                test: require.resolve('tinymce/tinymce'),
                loaders: [
                    'imports?this=>window',
                    'exports?window.tinymce'
                ]
            },
            {
                test: /tinymce\/(themes|plugins)\//,
                loaders: [
                    'imports?this=>window'
                ]
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery",
            "window.$": "jquery"
        }),
        new webpack.DefinePlugin({
            "require.specified": "require.resolve"
        })
    ],
    watch: true
};