$(document).ready(function () {
  // Initialize TinyMCE editor
  tinymce.init({
    selector: "textarea#editor",
    plugins: "lists, link, image, media",
    toolbar:
      "h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help",
    menubar: false,
    setup: function (editor) {
      // Apply the focus effect when the editor is initialized
      editor.on("init", function () {
        $(editor.getContainer()).css({
          transition: "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out",
        });
      });

      // Apply the focus effect when the editor gains focus
      editor.on("focus", function () {
        $(editor.getContainer()).css({
          boxShadow: "0 0 0 .2rem rgba(0, 123, 255, .25)",
          borderColor: "#80bdff",
        });
      });

      // Remove the focus effect when the editor loses focus
      editor.on("blur", function () {
        $(editor.getContainer()).css({
          boxShadow: "",
          borderColor: "",
        });
      });
    },
  });

  // Show/hide image preview wrapper based on file input changes
  $("#fileInput").on("change", function () {
    const imagePreviewWrapper = $("#imagePreviewWrapper");
    if (this.files.length > 0) {
      imagePreviewWrapper.show(); // Display the wrapper if files are selected
    } else {
      imagePreviewWrapper.hide(); // Hide the wrapper if no files are selected
    }
  });

  // Validation and form submission
  $("form").on("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault(); // Prevent form submission if validation fails
    }
  });

  // Validation logic remains unchanged within the validateForm function

  // Display error message for a specific element
  function displayErrorMessage(message, elementId) {
    $("#" + elementId).text(message);
  }

  // Clear error message for a specific element
  function clearErrorMessage(elementId) {
    $("#" + elementId).text("");
  }
});

// Execute the code when the DOM is fully loaded
$(document).ready(function() {
  // Script 1: Tags input script
  const tagsList = $("#tags"); // Get the tags list element
  const inputTag = $("#input-tag"); // Get the input tag element

  if (inputTag.length) {
    // Ensure the input element exists before adding the event listener
    inputTag.on("keydown", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();

        const tagContent = inputTag.val().trim();

        if (tagContent !== "") {
          // Create a new tag item and delete button using jQuery
          const tagItem = $("<li>").text(tagContent);

          const deleteButton = $("<button>")
            .addClass("delete-button")
            .text("X")
            .on("click", function() {
              tagItem.remove(); // Remove tag item when delete button is clicked
              updateTagsInput();
            });

          tagItem.append(deleteButton);
          tagsList.append(tagItem); // Add the new tag item to the list

          // Clear the input element's value
          inputTag.val("");

          // Update the hidden input with the updated tags list
          updateTagsInput();
        }
      }
    });
  }

  // Update the hidden input field with the selected tags
  function updateTagsInput() {
    const tags = tagsList.find("li").map(function() {
      const tagContent = $(this).text().trim();
      // Remove the "X" button from the tag content
      return tagContent.replace(/X$/, "").trim();
    }).get();
    $("#tags-input").val(JSON.stringify(tags));
  }

  // Script 2: File input script
  const fileInput = $("#fileInput"); // Get the file input element
  const fileNameDisplay = $("#fileNameDisplay"); // Get the file name display element
  const imagePreview = $("#imagePreview"); // Get the image preview element

  if (fileInput.length) {
    // Ensure the file input element exists before adding the event listener
    fileInput.on("change", handleFileInputChange);
  }

  // Handle changes in the file input
  function handleFileInputChange() {
    // Get the selected file
    const selectedFile = fileInput[0].files[0];

    // Log the selected file name to the console
    console.log("Selected File Name:", selectedFile.name);
    
    // Display the name of the selected file in the file name display element
    if (selectedFile) {
      fileNameDisplay.val(selectedFile.name);
    } else {
      fileNameDisplay.val("");
    }

    // Display a preview image if it's an image file
    if (selectedFile && selectedFile.type.startsWith("image/")) {
      const previewImage = $("<img>")
        .attr("src", URL.createObjectURL(selectedFile))
        .addClass("preview-image")
        .addClass("image-preview"); // Add class for styling
      imagePreview.empty(); // Clear previous preview
      imagePreview.append(previewImage);
    } else {
      imagePreview.empty(); // Clear preview if not an image
    }
  }
});
