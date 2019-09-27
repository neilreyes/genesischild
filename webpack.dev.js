// webpack v4
const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
	mode: "development",
    devServer: {
        contentBase: "./assets/dist",
        port: 7700
    }
});