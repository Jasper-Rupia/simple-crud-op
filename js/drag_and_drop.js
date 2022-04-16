//selecting all required elements
const drop_area = document.querySelector("#drag_area");

//This is a grobal variable and we'l use it inside multiple function
let my_file; 

//if user drag file over Drag area
drop_area.addEventListener("dragover", (event_var)=>{
    event_var.preventDefault(); //prevent default behaviour like preview on onother tab
    console.log("File is over drag area");
});

//if user leave dragged file from Drag area
drop_area.addEventListener("dragleave", ()=>{
    console.log("File is outside from drag area");
});

//if user drop file on Drag area
drop_area.addEventListener("drop", (event_var)=>{
    event_var.preventDefault(); //prevent default behaviour like preview on onother tab
    console.log("File is dropped drag area");
    //getting user selected file and [0] means if user select multiple we'll pick the first only
    my_file = event_var.dataTransfer.files;
    console.log(my_file);
    let file_type = my_file[0].type;
    
    let valid_extensions = ["image/jpeg", "image/jpg", "image/png"];
    if(valid_extensions.includes(file_type)){
        let file_reader = new FileReader(); //creating file_reader object
        
        file_reader.onload = ()=>{
            let fileUrl = file_reader.result; //passing user file source in fileUrl variable
            console.log(fileUrl);

            let img_tag = '<img src="$(fileUrl)" >'; //creating an image tag
            drop_area.innerHTML = img_tag; // adding tag inside drag_area container
        }
        file_reader.readAsDataURL(my_file[0]);
    }else{
        alert("This is not an image file");
    }
});
