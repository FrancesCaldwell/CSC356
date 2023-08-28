<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courage - Edit Post</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="blog.css" />
    <!-- Link to Bootstrap-->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.rawgit.com/bootstrap-wysiwyg/bootstrap3-wysiwyg/master/src/bootstrap3-wysihtml5.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <!-- Tinymce -->
    <script
      src="https://cdn.tiny.cloud/1/luxa1befilmgrfy9trl4gs9944diyr5cls8ily2nhih3vao4/tinymce/6/tinymce.min.js"
      referrerpolicy="origin"
    ></script>
              <!-- Blog JavaScript File -->
<script src="blog.js"></script>
  </head>
  <body>
              <!-- Add a back button to navigate back to the home page -->
    <a id="back-button" href="home.php">←</a>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="process_blogpost.php" role="form" enctype="multipart/form-data">
              <!-- Form inputs for title, challenge type, tags, and image -->
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                name="title"
                placeholder="Blog Title"
              />
              <div class="error-message" id="title-error" style="color:rgb(255, 87, 51)"></div>
            </div>
            <!-- Challenge type selection -->
            <div class="form-group" style="display: flex">
<details class="custom-select">
  <summary class="radios">
    <input type="radio" name="item" id="default" title="Select Challenge Type:" value="" checked />
    <input type="radio" name="item" id="7-day" title="7 Day" value="7-Day" />
    <input type="radio" name="item" id="30-day" title="30 Day" value="30-Day" />
    <input type="radio" name="item" id="90-day" title="90 Day" value="90-Day" />
    <input type="radio" name="item" id="365-day" title="365 Day" value="365-day" />
  </summary>
  <ul class="list">
    <li>
      <label for="7-day">7 Day</label>
    </li>
    <li>
      <label for="30-day">30 Day</label>
    </li>
    <li>
      <label for="90-day">90 Day</label>
    </li>
    <li>
      <label for="365-day">365 Day</label>
    </li>
  </ul>
</details>
<!-- Tags input field -->
              <div class="tags-input">
                <ul id="tags"></ul>
                <input
                  type="text"
                  id="input-tag"
                  placeholder="Enter tag name"
                />
                <input type="hidden" id="tags-input" name="tags" />
              </div>
            </div>
<div class="error-message" id="challenge-type-error" style="color: rgb(255, 87, 51)"></div>
<!-- File input for image selection -->
            <div class="form-group">
              <label><b>Image</b> </label>
              <div class="input-group">
  <span class="input-group-btn">
    <span class="btn btn-primary btn-file">
      Browse <input type="file" id="fileInput" name="bimgs" multiple />
    </span>
  </span>
  <input type="text" class="form-control" id="fileNameDisplay" readonly />
</div>
<!-- ... -->
<div id="imagePreviewWrapper" class="image-preview-wrapper">
  <div id="imagePreview" class="image-preview"></div>
</div>
  <div id="image-error" class="error-message" style="color:rgb(255, 87, 51)"></div>
            </div>
<!-- Textarea for post content -->
            <div class="form-group">
              <textarea id="editor" name="editor"></textarea>
            </div>
            <div id="content-error" class="error-message" style="color:rgb(255, 87, 51)"></div>
            <div class="form-group">
  <input type="hidden" id="editorContent" name="editorContent" />
</div>
<!-- Submit button -->
            <div class="form-group">
              <input
                type="submit"
                name="Submit"
                value="Publish"
                class="btn btn-primary form-control"
                style="
                  background-color: rgb(90, 75, 202) !important;
                  border: 1px solid rgb(90, 75, 202) !important;
                "
              />
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
  document.querySelector('form').addEventListener('submit', function () {
    const editor = tinymce.get('editor');
    const editorContentInput = document.getElementById('editorContent');
    editorContentInput.value = editor.getContent();
  });
</script>
  </body>
</html>
