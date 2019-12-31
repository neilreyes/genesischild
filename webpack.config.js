// webpack v4
const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const WebpackMd5Hash = require("webpack-md5-hash");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");
const autoprefixer = require("autoprefixer");

module.exports = {
    entry: {
        main: "./assets/src/index.js"
        /* admin: "./assets/src/admin/index.js" */
    },
    output: {
        path: path.resolve(__dirname, "assets/dist"),
        filename: "[name].js"
        /* filename: "[name].[hash].js" */
    },
    resolve: {
        modules: ["node_modules"],
        alias: {
            TweenLite: "gsap/src/minified/TweenLite.min.js",
            TweenMax: "gsap/src/minified/TweenMax.min.js",
            TimelineLite: "gsap/src/minified/TimelineLite.min.js",
            TimelineMax: "gsap/src/minified/TimelineMax.min.js",
            ScrollMagic: "scrollmagic/scrollmagic/minified/ScrollMagic.min.js",
            "animation.gsap":
                "scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js",
            "debug.addIndicators":
                "scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"
        }
    },
    devServer: {
        contentBase: "./assets/dist",
        port: 7700
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ["@babel/preset-env"]
                    }
                }
            },
            {
                test: /\.css$/,
                use: [
                    "style-loader",
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    "postcss-loader"
                ]
            },
            {
                test: /\.(gif|png|jpe?g|svg)$/i,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: "[name].[ext]",
                            outputPath: "images"
                        }
                    },
                    {
                        loader: "image-webpack-loader",
                        options: {
                            bypassOnDebug: true
                        }
                    }
                ]
            },
            {
                test: /\.s[c|a]ss$/,
                use: [
                    "style-loader",
                    MiniCssExtractPlugin.loader,
                    {
                        loader: "css-loader",
                        options: {
                            url: false
                        }
                    },
                    "postcss-loader",
                    "sass-loader"
                ]
            },
            {
                test: /\.(woff(2)?|ttf|eot|otf)(\?v=\d+\.\d+\.\d+)?$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: "[name].[ext]",
                            outputPath: "fonts/"
                        }
                    }
                ]
            }
        ]
    },
    optimization: {
        splitChunks: {
            chunks: "all"
        },
        minimizer: [new OptimizeCSSAssetsPlugin({})]
    },
    mode: "production",
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css"
            /* filename: "style.[contenthash].css" */
        }),
        /*  new CleanWebpackPlugin("dist", {}),
        
        new HtmlWebpackPlugin({
            inject: false,
            hash: true,
            template: "./src/index.html",
            filename: "index.html"
        }), */
        new WebpackMd5Hash()
    ]
};
