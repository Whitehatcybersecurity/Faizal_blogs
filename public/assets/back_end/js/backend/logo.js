
$(function () { 
    $("form[name='logo']").validate({ 
        rules: {
            fileHeaderLogoImage: {
                required: true,
                extension: "jpg|jpeg|png|gif" // add allowed extensions here
            },
            fileFooterLogoImage: {
                required: true,
                extension: "jpg|jpeg|png|gif"
            }
        },
        messages: {
            fileHeaderLogoImage: {
                required: "Please upload a header logo.",
                extension: "Only image files (jpg, jpeg, png, gif) are allowed."
            },
            fileFooterLogoImage: {
                required: "Please upload a footer logo.",
                extension: "Only image files (jpg, jpeg, png, gif) are allowed."
            }
        },
        errorPlacement: function (error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents(".form-group"));
            } else {
                // This is the default behavior
                // error.insertAfter(element);
                if (element.siblings(".error").html() == undefined) {
                    error.appendTo(element.parent().next(".error"));
                } else {
                    error.appendTo(element.siblings(".error"));
                }
            }
        },
    });
});


//Image Showing
const inputFiles = document.querySelectorAll('input[type="file"]');
const previewImages = document.querySelectorAll('img[id^="previewImage"]');

inputFiles.forEach(function (inputFile, index) {console.log("Hi");
    inputFile.addEventListener("change", function () {
        const file = this.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            previewImages[index].setAttribute("src", this.result);
        });

        if (file) {
            reader.readAsDataURL(file);
        }
    });
});

