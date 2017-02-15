<?php
/**
* Template Name: React
*/
?>

<div id="react"></div>

<script type="text/babel">
var Hello = React.createClass({
    render : function (){
        return (
            <div>
            <h1>Hello, From a React Component!</h1>
            <p>This is awesome!</p>
            </div>
        );
    }
});
ReactDOM.render( <Hello/>, document.getElementById('react'));
</script>
