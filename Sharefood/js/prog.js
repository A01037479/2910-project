const doubleBtn = document.getElementById("doubleBtn");
const popContainer = document.getElementById('popContainer');

// add people
const addPeople = (num) => {
	for (let i = 0; i < num; i++) {
		setTimeout(function() {
			let person = document.createElement('li');
			person.innerHTML = '<span class="head"></span><span class="body"></span>';
			popContainer.appendChild(person);
		}, 5 * i);
	}
}

addPeople(300);
