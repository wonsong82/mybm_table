var path = require('path');


module.exports = {

  entries: [
    {
      app : './resources/views/index.js',


    }
  ],

  output: path.join(__dirname, 'public/assets')
};