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
			apiUrlUpdate: "../update.php",
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
		updateToDoStatus(index, status) {
			const updateData = { indice: index, done: status };
			axios
				.post(this.apiUrlUpdate, updateData, this.getConfigRequest)
				.then((results) => {
					this.toDoList = results.data;
				});
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
