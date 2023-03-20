const readURL = (input) => {
	if (input.value) {
		let reader = new FileReader();

		reader.onload = (e) => {
			document.querySelector('.profile-pic').src = e.target.result;
		}

		reader.readAsDataURL(input.value);
	} else {
		console.log('No image found', input.files);
	}
}

const fileUploader = document.querySelector('.file-upload');
const uploadButton = document.querySelector('.upload-button');


fileUploader.addEventListener('change', () => {
	readURL(this);
})

uploadButton.addEventListener('click', () => {
	fileUploader.click();
})

async function myFunction() {
	console.log(document.querySelector('.profile-pic').src);
}

myFunction().then

