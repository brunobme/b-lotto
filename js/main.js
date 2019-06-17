var app = new Vue({
	el: '#app',
	data: {
		title: "Wards & Punis",
		todo: {
			what: "",
			due_date:"",
			create_date:"",
			details: "",
		}
		bool: false,
	},
	methods:{
		addTodo() {
			let ( what, due_date, details) = 
			var bool = this.bool;
			this.bool = !bool;
			return bool
			// alert(`Success: ${this.randN}`)
		}
	}
})
