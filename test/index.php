<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test Document</title>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
	
	<div id="app">
  		{{ message }}
	</div>
	
	<div id="app-2">
	  <span v-bind:title="message">
		Hover your mouse over me for a few seconds
		to see my dynamically bound title!
	  </span>
	</div>
	
	<div id="app-4">
	  	<ol>
			<li v-for="todo in todos">
		  		{{ todo.text }}
			</li>
	 	</ol>
	</div>
	
	<div id="app-5">
	 	 <p>{{ message }}</p>
	 	<button v-on:click="reverseMessage">Reverse Message</button>
	</div>
	
</body>
<script>

	var app = new Vue({
	  el: '#app',
	  data: {
		message: 'Hello Vue!'
	  }
	})
	
	var app2 = new Vue({
	  el: '#app-2',
	  data: {
		message: 'You loaded this page on ' + new Date().toLocaleString()
	  }
	})
	
	var app4 = new Vue({
	  el: '#app-4',
	  data: {
		todos: [
		  { text: 'Learn JavaScript' },
		  { text: 'Learn Vue' },
		  { text: 'Build something awesome' }
		]
	  }
	})
	
	var app5 = new Vue({
	  el: '#app-5',
	  data: {
		message: 'Hello Vue.js!'
	  },
	  methods: {
		reverseMessage: function () {
		  this.message = this.message.split('').reverse().join('')
		}
	  }
	})
	
</script>
</html>