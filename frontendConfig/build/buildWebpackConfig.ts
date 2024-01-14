import webpack from 'webpack'
import {BuildOptions} from './types/config'
import {buildLoaders} from './buildLoaders'
import {buildResolves} from './buildResolves'
import {buildPlugins} from './buildPlugins'

export function buildWebpackConfig(options: BuildOptions): webpack.Configuration {
    const {paths, mode, isDev} = options

    return {
        mode,
        entry: paths.entry,
        module: {
            rules: buildLoaders(options),
        },
        resolve: buildResolves(options),
        output: {
            filename: '[name].[contenthash].js',
            path: paths.build,
            clean: true,
        },
        plugins: buildPlugins(options),
        devtool: isDev ? 'inline-source-map' : undefined,
    }
}
