(function($){

  "use strict";

  var pluginName = 'kicker',
      PluginClass;


  /* Enter PluginOptions */
  $[pluginName+'Default'] = {
    enabled: true,
    container: window,
    url: 'asdasdasd',
    after: function(){},
    before: function(){},
    initialized: function(){},
  };
  

  PluginClass = function() {

    var selfObj = this;
    this.item = false;
    this.initOptions = new Object($[pluginName+'Default']);
    
    // Startpunkt
    this.init = function(elem) {
      selfObj = this;

      selfObj.elem = elem;
      selfObj.item = $(this.elem);
      selfObj.initialized();

      if(!selfObj.enabled)
        return;

      console.log('INIT URL',selfObj.url);


      selfObj.loaded();
    };

    this.disable = function() {
      selfObj.enabled = false;
    };

    this.enable = function() {
      selfObj.enabled = true;
    };

    this.loaded = function() {
      if(!selfObj.enabled)
        return;

      selfObj.internBefore();
      console.log('Plugin loaded');
      selfObj.internAfter();
    };

    this.internBefore = function() {
      if(!selfObj.enabled)
        return;
      selfObj.before();
    };

    this.internAfter = function() {
      if(!selfObj.enabled)
        return;
      selfObj.after();
    };

    this.callme = function(newData) {
      console.log("Called this method with data:",newData);
      console.log('Is enabled?',selfObj.enabled);
      return "Success!";
    };
  };

  $[pluginName] = $.fn[pluginName] = function(settings) {
    var element = typeof this === 'function'?$('html'):this,
        newData = arguments[1]||{},
        returnElement = [];
        
    returnElement[0] = element.each(function(k,i) {
      var pluginClass = $.data(this, pluginName);

      if(!settings || typeof settings === 'object' || settings === 'init') {

        if(!pluginClass) {
          if(settings === 'init')
            settings = arguments[1] || {};
          pluginClass = new PluginClass();

          var newOptions = new Object(pluginClass.initOptions);

          /* Space to reset some standart options */

          /***/

          if(settings)
            newOptions = $.extend(true,{},newOptions,settings);
          pluginClass = $.extend(newOptions,pluginClass);
          /** Initialisieren. */
          this[pluginName] = pluginClass;
          pluginClass.init(this);
          if(element.prop('tagName').toLowerCase() !== 'html')
            $.data(this, pluginName, pluginClass);
        } else {
          pluginClass.init(this,1);
          if(element.prop('tagName').toLowerCase() !== 'html')
            $.data(this, pluginName, pluginClass);
        }
      } else if(!pluginClass) {
        return;
      } else if(pluginClass[settings]) {
        var method = settings;
        returnElement[1] = pluginClass[method](newData);
      } else {
        return;
      }
    });

    if(returnElement[1] !== undefined) return returnElement[1];
      return returnElement[0];

  };
  
})(jQuery);