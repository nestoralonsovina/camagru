const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById("snap");
const errorMsgElement = document.querySelector('span#errorMsg');
const controlCenter = document.getElementById('controlCenter');
const discard = document.getElementById('discard');
const saveButton = document.getElementById('savePhoto');
const uploader = document.getElementById('upload-photo');

const constraints = {
    video: {
        width: 640, height: 480
    }
};

/*
	USEFUL FUNCTIONS
*/

function displayError(message)
{
    //function to display basic error
    return message;
}

function displayCanvas() {
    canvas.style.display = 'flex';
    for (let node of controlCenter.children) {
        node.style.display = 'block';
    }
    video.style.display = 'none';
}

function deleteCanvas() {
    canvas.style.display = 'none';
    for (let node of controlCenter.children) {
        node.style.display = 'none';
    }
    video.style.display = 'block'
}

function showAlert(status, msg, el) {
    el.innerHTML = ' <div class="alert alert-' + status +'">\n' +
        '                <strong>Photo Posted!</strong>\n' +
        '            </div>';
}

/*
	PHOTO MANAGEMENT
 */

// access webcam
navigator.mediaDevices.getUserMedia(constraints)
    .then (stream => {
        window.stream = stream;
        video.srcObject = stream;
    })
    .catch (e => {
        errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
        // handle denied access properly to evade php error
    });

video.addEventListener('loadedmetadata', () => {
    ctx.translate(video.videoWidth, 0);
    ctx.scale(-1, 1);
});

let ctx = canvas.getContext('2d');

// Draw image
snap.addEventListener("click", function() {
    ctx.drawImage(video, 0, 0, 640, 480);
    displayCanvas();
});

// discard image
discard.addEventListener("click", () => {
    deleteCanvas();
});

// Upload image from computer
// TODO: improve the scaling
uploader.addEventListener("change", (e) => {
    let reader = new FileReader();
    reader.onload = (event) => {
        let img = new Image();
        img.onload = () => {
            ctx.drawImage(img, 0, 0, 640, 640);
        };
        img.src = event.target.result;
    };
    reader.readAsDataURL(e.target.files[0]);
    displayCanvas();
});

/* STICKERS SECTION */
let stickerList = document.getElementsByClassName('sticker');

Array.from(stickerList).forEach(element => {
    element.addEventListener('click', () => {
        Array.from(stickerList).forEach(el => {
            el.className = "column is-1 sticker";
        });
        element.className += " selected-sticker";
    });
});

/* PUBLISH PHOTO */
saveButton.addEventListener('click', (e) => {

    const dataUrl = canvas.toDataURL("image/png");
    let	stickerUrl = 'hehe this is gonna cause troubles';
    let error = false;

    Array.from(stickerList).forEach(el => {
        if (el.classList.contains("selected-sticker")) {
            if (stickerUrl == null) {
                stickerUrl = el.getElementsByTagName('img')[0];
            } else {
                displayError("More than one sticker selected");
                error = true;
            }
        }
    });

    if (stickerUrl === null && !error) {
        console.error("No sticker selected, but really, you're just stupid");
    } else if (!error) {
        const data = {
            "action": 'save_photo',
            "time": e.timeStamp,
            "photoBase64": dataUrl,
            "sticker": stickerUrl,
            "sticker_x": 0,
            "sticker_y": 0
        };
        fetch("/photos/add", {
            method: "POST",
            headers: new Headers({
                "Content-Type": 'application/json'
            }),
            credentials: "include", // useful for including session ID (check how to)
            body: JSON.stringify(data) // coordinate the body type with content-type
        })
            .then(response => response.json())
            .then(data => {
                deleteCanvas();
                showAlert('success', 'Photo posted', document.getElementById('alerts'));
                setTimeout(() => {
                    document.getElementById('alerts').innerHTML = '';
                }, 1000)
            })
            .catch(error => console.error(error));
    }
});
