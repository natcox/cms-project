$(document).ready(function(){


  //CK EDITOR
      ClassicEditor
          .create( document.querySelector( '#editor' ) )
          .catch( error => {
              console.error( error );
          } );

// Select all Checkboxes for bulk post edit
      $('#selectAllBoxes').click(function(event){
      if(this.checked) {
      $('.checkBoxes').each(function(){
        this.checked = true;
      });
      } else {
        $('.checkBoxes').each(function(){
        this.checked = false;
      });
      }
      });
      });
