const path = require('path')
const PrerenderSPAPlugin = require('prerender-spa-plugin')
const fs = require('fs')

// vue.config.js
module.exports = {
  configureWebpack: {
    plugins: [
      new PrerenderSPAPlugin({

        // Required - The path to the webpack-outputted app to prerender.
        staticDir: path.join(__dirname, 'dist'),

        routes: [ '/' ],

        postProcessHtml: function (context) {
          try {
            const data = fs.readFileSync('./public/lib/seo-metas.php', 'utf8')
            console.log(data)
            var titles = {
              '/': data
            }
            return context.html.replace(
              /<title>(.*)<\/head>/i,
              titles[context.route]
            )
          } catch (err) {
            console.error(err)
          }
        }
        
      })
    ]
  }
}
