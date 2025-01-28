const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/')
    .setPublicPath('/bundles/markocupicservicelink')
    .setManifestKeyPrefix('')

    .addEntry('countup/countUp', './assets/countup/countUp.js')

    .copyFiles({
        from: './node_modules/countup.js/dist',
        to: 'countup/[path][name].[hash:8].[ext]',
        pattern: /(countUp\.umd\.js)$/,
    })

    .disableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps()
    .enableVersioning()

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    .configureBabel(function (config) {
        config.plugins.push('@babel/plugin-transform-runtime');
    }, {})

    .enablePostCssLoader()
;

module.exports = Encore.getWebpackConfig();
