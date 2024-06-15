console.log(`Main collegato`);

const { createApp } = Vue;

createApp({
	data() {
		return {
			toDoList: [],
			valueInput: "",
			badgeToDo: "ToDo",
			badgeDone: "Done",
			apiUrlAdd: "../add.php",
			apiUrlRemove: "../remove.php",
			apiUrlGet: "../list.php",
			getConfigRequest: {
				headers: {
					"Content-Type": "multipart/form-data",
				},
			},
		};
	},
	methods: {
		addToDo(valore) {
			const newToDo = { stringa: valore, done: false };
			axios
				.post(this.apiUrlAdd, newToDo, this.getConfigRequest)
				.then((results) => {
					console.log(results.data);
					this.toDoList = results.data;
					this.valueInput = "";
				});
		},
		falseToDo(array, indice) {
			array[indice].done = false;
		},
		trueToDo(array, indice) {
			array[indice].done = true;
		},
		removeToDo(index) {
			const indice = { indice: index };
			axios
				.post(this.apiUrlRemove, indice, this.getConfigRequest)
				.then(() => {
					this.toDoList.splice(index, 1);
				});
		},
		removeList() {
			this.toDoList = [];
		},
	},
	mounted() {
		axios.get(this.apiUrlGet).then((results) => {
			this.toDoList = results.data;
		});
	},
}).mount("#app");
