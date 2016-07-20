var webpack = require('webpack');
var ExtractTextPlugin = require("extract-text-webpack-plugin");

var extractSass = new ExtractTextPlugin('all1.css');
var extractCss = new ExtractTextPlugin('all.css');

module.exports = {
    entry: {
        'site': './resources/assets/site/js/common.js',
        'admin': './resources/assets/admin/js/common.js'
    },
    output: {
        'path': 'public/assets',
        'publicPath': '/assets/',
        'filename': '[name].all.js'
    },
    devtool: "source-map",
    module: {
        loaders: [

            // Css loaders
            {
                test: /\.(css|scss)$/i,
                loader: extractCss.extract(['css?sourceMap','sass?sourceMap'])
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
        extractSass,
        extractCss
    ],
    externals: {
        jquery: 'jQuery'
    },
    watch: true
};