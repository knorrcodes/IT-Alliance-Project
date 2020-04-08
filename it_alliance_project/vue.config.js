module.exports = {
    devServer: {
        proxy: 'http://localhost/ita/',
    }
    /* ,
        publicPath: process.env.NODE_ENV === 'production' ?
            '/ita/' : './' */
}