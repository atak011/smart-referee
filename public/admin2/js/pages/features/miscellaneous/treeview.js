"use strict";

var KTTreeview = function () {
    var _demo5 = function() {
        $("#kt_tree_5").jstree({
            "core" : {
                "themes" : {
                    "responsive": false
                },
                // so that create works
                "check_callback" : true,

            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder text-success"
                },
                "file" : {
                    "icon" : "fa fa-file  text-success"
                }
            },
            "state" : { "key" : "demo2" },
            "plugins" : [ "dnd", "state", "types" ]
        });
    }

    var _demo6 = function() {
        $("#kt_tree_6").jstree({
            "core": {
                "themes": {
                    "responsive": false
                },
                // so that create works
                "check_callback": true,
                'data': {
                    'url': function(node) {
                        return HOST_URL + '/api//jstree/ajax_data.php';
                    },
                    'data': function(node) {
                        return {
                            'parent': node.id
                        };
                    }
                }
            },
            "types": {
                "default": {
                    "icon": "fa fa-folder text-primary"
                },
                "file": {
                    "icon": "fa fa-file  text-primary"
                }
            },
            "state": {
                "key": "demo3"
            },
            "plugins": ["dnd", "state", "types"]
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            _demo5();
            _demo6();
        }
    };
}();

jQuery(document).ready(function() {
    KTTreeview.init();
});
