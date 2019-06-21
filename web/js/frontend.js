$(function() {
    var particles = document.getElementById("particles-js");
    if(typeof(particles) != 'undefined' && particles != null) {
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 5,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": ["#BD10E0", "#B8E986", "#50E3C2", "#FFD300", "#E86363"]
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#b6b2b2"
                    }
                },
                "opacity": {
                    "value": 1,
                    "random": false,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 4,
                    "random": false,
                    "anim": {
                        "enable": true,
                        "speed": 12.181158184520175,
                        "size_min": 4,
                        "sync": true
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#c8c8c8",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "bounce",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": false,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": false,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    }

    var elasti = document.getElementById( 'elasticstack' );
    if(typeof(elasti) != 'undefined' && elasti != null) {
        new ElastiStack(document.getElementById('elasticstack'), {
            // distDragBack: if the user stops dragging the image in a area that does not exceed [distDragBack]px
            // for either x or y then the image goes back to the stack
            distDragBack: 50,

            // distDragMax: if the user drags the image in a area that exceeds [distDragMax]px
            // for either x or y then the image moves away from the stack
            distDragMax: 450

            // callback
            //onUpdateStack : function( current ) { return false; }
        });
    }

});