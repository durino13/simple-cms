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
    watch: true
    // debug: true
};