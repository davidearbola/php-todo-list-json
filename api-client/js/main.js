console.log(`Main collegato`);

const { createApp } = Vue;

createApp({
	data() {
		return {
			toDoList: [],
			valueInput: "",
			badgeToDo: "ToDo",
			badgeDone: "Done",
			apiUrl: "../api.php",
			getConfigRequest: {
				headers: {
					"Content-Type": "multipart/form-data",
				},
			},
		};
	},
	methods: {
		addToDo(valore) {
			const addData = { stringa: valore, done: false, request: "add" };
			axios
				.post(this.apiUrl, addData, this.getConfigRequest)
				.then((results) => {
					console.log(results.data);
					this.toDoList = results.data;
					this.valueInput = "";
				});
		},
		updateToDoStatus(index, status) {
			const updateData = {
				indice: index,
				done: status,
				request: "update",
			};
			axios
				.post(this.apiUrl, updateData, this.getConfigRequest)
				.then((results) => {
					this.toDoList = results.data;
				});
		},
		removeToDo(index) {
			const removeData = { indice: index, request: "remove" };
			axios
				.post(this.apiUrl, removeData, this.getConfigRequest)
				.then(() => {
					this.toDoList.splice(index, 1);
				});
		},
		deleteList() {
			const deleteList = { request: "delete" };
			axios
				.post(this.apiUrl, deleteList, this.getConfigRequest)
				.then(() => {
					this.toDoList = [];
				});
		},
	},
	mounted() {
		const showList = { request: "show" };
		axios.get(this.apiUrl, showList).then((results) => {
			this.toDoList = results.data;
		});
	},
}).mount("#app");
