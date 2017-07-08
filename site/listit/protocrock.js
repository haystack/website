// prototocrock.js

// namespace
PROTOCROCK = {};

// crockford's code:
PROTOCROCK.crock_object = function(obj) {
    var F = function() { };
    F.prototype = obj;
    return new F();     
};
PROTOCROCK.arguments2array = function(v)  {
    var tmp = [];
    for (var i = 0; i < v.length; i++) { 
	tmp.push(v[i]);
    }
    return tmp;
};
PROTOCROCK.super = function(this_, method) {
    var args = PROTOCROCK.arguments2array(arguments);
    var fnargs = args.slice(2);
    method = (typeof(method) == 'string') ? this_.super[method] : method;
    return method.apply(this_,fnargs);
}

// max's code:
PROTOCROCK._newify_sans_init = function(cd) {
    if (cd == undefined) return {};    
    var CD_Constructor = function() { };
    var super_proto = PROTOCROCK._newify_sans_init(cd.superclass);
    CD_Constructor.prototype = PROTOCROCK.crock_object(super_proto);
    for (var k in cd) {
	if (k == 'superclass') continue;
	CD_Constructor.prototype[k] = cd[k];
    }
    var obj = new CD_Constructor();
    obj.super = super_proto;
    return obj;
};
PROTOCROCK.newify = function(cd) {
    var obj = PROTOCROCK._newify_sans_init.apply(null,arguments);
    var argsa = PROTOCROCK.arguments2array(arguments);
    if (obj.initialize) {
	obj.initialize.apply(obj,argsa.slice(1));
    }
    obj.__class__ = cd;
    return obj;
};
PROTOCROCK.isinstanceof = function(x,target_class) {
    var helper = function(cd) {
	if (cd == undefined) return false;
	if (cd == target_class) return true;
	return helper(cd.superclass);	
    }
    return x.__class__ == target_class || helper(x.__class__);
};

newify = PROTOCROCK.newify;
/*
// Test cases:

var Class1 = {
    foo : function() {
	alert('foo');
    },
    initialize: function(x) {
	this.baz = x;
	alert('x is ' + x);
    }
};
var Class2 = {
    superclass : Class1,
    initialize: function(x) {
	this.super.initialize(x*2);
	alert('init2');
    },
    bar : function() {
	alert(this.baz);
    }
};

instance = newify(Class2,18);
instance.bar();

*/