var webpack = require('webpack');

module.exports = {
    output: {
        'filename': 'all.js'
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery",
            "window.$": "jquery"
        })
    ],
    // module: {
    //     loaders: [{
    //         test: /node_modules\/.+\.(jsx|js)$/,
    //         loader: 'imports?jQuery=jquery,$=jquery,this=>window'
    //     }]
    // },
    watch: true
    // debug: true
};