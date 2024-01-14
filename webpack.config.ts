import path from 'path'
import {buildWebpackConfig} from './frontendConfig/build/buildWebpackConfig'
import {BuildEnv, BuildMode, BuildPaths} from './frontendConfig/build/types/config'

export default (env: BuildEnv) => {
    const mode: BuildMode = env.mode || 'development'

    const paths: BuildPaths = {
        entry: path.resolve(__dirname, 'assets', 'app.ts'),
        build: path.resolve(__dirname, 'public', 'build'),
        html: path.resolve(__dirname, 'public', 'index.html'),
        src: path.resolve(__dirname, 'src'),
    }

    const isDev: boolean = mode === 'development'

    const port: number = env.port || 3000

    return buildWebpackConfig({
        mode,
        paths,
        isDev
    })
}
