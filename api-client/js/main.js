console.log(`Main collegato`);

const { createApp } = Vue;

createApp({
	data() {
		return {
			toDoList: [],
			valueInput: "",
			badgeToDo: "ToDo",
			badgeDone: "Done",
		};
	},
	methods: {
		addToDo(valore, array) {
			array.push({ stringa: valore, done: false });
			this.valueInput = "";
		},
		falseToDo(array, indice) {
			array[indice].done = false;
		},
		trueToDo(array, indice) {
			array[indice].done = true;
		},
		removeList() {
			this.toDoList = [];
		},
	},
	mounted() {
		axios.get("../api.php").then((results) => {
			this.toDoList = results.data;
		});
	},
}).mount("#app");
