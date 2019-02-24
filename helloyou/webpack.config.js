const path = require("path");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const webpack = require("webpack");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
    mode: "development",
    context: path.resolve(__dirname, "./"),
    entry: { main: "./src/index.tsx" },
    output: {
        path: path.resolve(__dirname, "./js"),
        filename: "./bundle.js"
    },
    module: {
        rules: [
            {
                test: /\.less/,
                exclude: /node_modules/,
                use: ExtractTextPlugin.extract({
                    //postcss load postcss.config.js
                    use: [
                        {
                            loader: "css-loader",
                            options: {
                                sourceMap: process.env ? false : true,
                                url: false //disable module path for background (publicPath is important)
                            }
                        },
                        {
                            loader: "postcss-loader"
                            //Configuration file postconfig.js
                        },
                        {
                            loader: "less-loader"
                        }
                    ]
                })
            },
            {
                test: /\.(woff|woff2|eot|ttf|svg)$/,
                include: /node_modules/,
                loader: "file-loader",
                options: {
                    name: "dist/assets/fonts/[name].[ext]",
                    publicPath: ""
                }
            },
            {
                test: /\.(svg|png|jpg|gif)$/,
                loader: "file-loader",
                options: {
                    name: "assets/images/[name].[ext]",
                    publicPath: ""
                }
            },
            {
                test: /\.(ts|tsx)?$/,
                loaders: ["ts-loader"],
                exclude: /(node_modules|bower_components)/
            }
        ]
    },
    resolve: {
        extensions: [".js", ".jsx", ".json", ".less", ".ts", ".tsx"],
        modules: [path.resolve("./node_modules")]
    },
    stats: { colors: true },
    devServer: {
        contentBase: path.join(__dirname, "dist"),
        compress: true,
        port: 9000
    },
    optimization: {
        splitChunks: {
            chunks: "async",
            minSize: 30000,
            maxSize: 0,
            minChunks: 1,
            maxAsyncRequests: 5,
            maxInitialRequests: 3,
            automaticNameDelimiter: "~",
            name: true,
            cacheGroups: {
                vendors: {
                    test: /[\\/]node_modules[\\/]/,
                    priority: -10
                },
                default: {
                    minChunks: 2,
                    priority: -20,
                    reuseExistingChunk: true
                }
            }
        }
    },
    plugins: [
        new ExtractTextPlugin("../style.css"),
        new CopyPlugin([{ from: "src/assets", to: "../assets" }])
    ]
};
