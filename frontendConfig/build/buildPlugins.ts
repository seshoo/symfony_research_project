import webpack from 'webpack'
import {BuildOptions} from './types/config'
import {WebpackManifestPlugin} from "webpack-manifest-plugin";

export function buildPlugins({}: BuildOptions): webpack.WebpackPluginInstance[] {
    return [
        new webpack.ProgressPlugin(),
        new WebpackManifestPlugin({
            basePath: '',
            publicPath: '/build/'
        })
    ]
}
