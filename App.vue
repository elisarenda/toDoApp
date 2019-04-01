<template>
  <div id="app">
    <h1>To Do List</h1>
    <formU :getData="getData"/>
    <todo v-for="(todo, index) in lists" :key='index' :todo='todo' :getData="getData"/> 
    <!-- :todo='todo' -> nom props -->
  </div>
</template>

<script>

import formU from "./components/form"
import todo from "./components/todo";

export default {
  name: 'app',
  components: {
    todo, // todo: todo -> si deux valeurs portent même nom
    formU
  },
  data(){
    return {
      lists:[]
    }
  },
  beforeMount: function() {
    this.getData()
    //juste avant component soit traité
  },
  methods:{
    //j'appelle mon API
    getData(){
      const req = new XMLHttpRequest();
      req.open('GET','http://localhost:8888/test-php/php-pdo/getdata.php', false);
      req.send(null);
      if (req.status === 200 ){
          console.log(req.response)
          this.lists = JSON.parse(req.response)
      } else {
          console.log('error', req.status, req.statusText)
      }
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
h1{
   color: rgba(175, 47, 47, 0.15);
   font-family: Dancing script;
   font-size: 60px;
}
</style>
