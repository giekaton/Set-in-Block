<template>
  <div>
    <div 
    class="dragdropcontainer"
    id="dragdropcontainer"
    v-on="!state_file_selected ? { click: file_input_click } : {}"
    v-on:mouseover="mouseOverHandler"
    v-on:mouseout="mouseOutHandler"
    v-on:dragover.prevent="dragOverHandler"
    v-on:dragleave.prevent="dragLeaveHandler"
    v-on:drop.prevent="dropHandler($event)"
    >

    <div>
      {{ text }}
      <input type="file" id="file_input" style="display:none;" @change="file_input_event">
      </div>
    </div>
    
  </div>

</div>
</template>

<script>
  var data = {
    text: 'Click to select or drag and drop a file...',
    state_file_selected: false
  }

  export default {
    data: function () {
      return data;
    },
    methods: {
      mouseOverHandler: function () {
        document.getElementById("dragdropcontainer").classList.add("dnd-hover");
      },
      mouseOutHandler: function () {
        document.getElementById("dragdropcontainer").classList.remove("dnd-hover");
      },
      dragOverHandler: function () {
        document.getElementById("dragdropcontainer").classList.add("dnd-hover");
      },
      dragLeaveHandler: function () {
        document.getElementById("dragdropcontainer").classList.remove("dnd-hover");
      },
      dropHandler: function (ev) {
        
        if (ev.dataTransfer.items) {
          // Use DataTransferItemList interface to access the file(s)
          for (var i = 0; i < ev.dataTransfer.items.length; i++) {
            // If dropped items aren't files, reject them
            if (ev.dataTransfer.items[i].kind === 'file') {
              let file = ev.dataTransfer.items[i].getAsFile();
              this.file_input_event_drag(file);
            }
          }
        } else {
          // Use DataTransfer interface to access the file(s)
          for (var i = 0; i < ev.dataTransfer.files.length; i++) {
            let file = ev.dataTransfer.items[i].getAsFile();
            this.file_input_event_drag(file);
          }
        }
        // Pass event to removeDragData for cleanup
        function removeDragData(ev) {
          console.log('Removing drag data')
          if (ev.dataTransfer.items) {
            // Use DataTransferItemList interface to remove the drag data
            ev.dataTransfer.items.clear();
          } else {
            // Use DataTransfer interface to remove the drag data
            ev.dataTransfer.clearData();
          }
        }
        removeDragData(ev)
      },
      file_input_click: function() {
        var file_input = document.getElementById('file_input');
        file_input.click();
      },
      file_input_event: function() {
        this.calculate_hash();
      },
      file_input_event_drag: function(file) {
        this.calculate_hash(file);
      },
      calculate_hash: function (file) {
        let self = this;
        this.text = "Please wait...";

        if (typeof file === 'undefined') {
          var filediv = document.getElementById("file_input");
          var file = filediv.files[0];
          var fileSize = filediv.files[0].size;
          var fileName = filediv.files[0].name;
        }
        else {
          var fileSize = file.size;
          var fileName = file.name;
        }
        
        var reader = new FileReader(); // Define a Reader

        if (file) {
          reader.onload = function (f) {
            var file_result = this.result; // this == reader, get the loaded file "result"
            var file_wordArr = CryptoJS.lib.WordArray.create(file_result); // convert blob to WordArray
            var sha256_hash = CryptoJS.SHA256(file_wordArr); // calculate SHA256 hash

            self.$emit('file-data', {fileName : fileName, fileSize : fileSize, fileHash : sha256_hash.toString()});
            self.text = 'File details below. Click to select another file...';
          };
          reader.readAsArrayBuffer(file); //read file as ArrayBuffer
        }
        
      }
    }
  }
</script>

<style>
  .dragdropcontainer {
    padding:10px;
    background-color:#f1f1f1;
    border:3px solid #e0e0e0;
    border-radius:5px;
    width: 100%;
    cursor: pointer;
  }

  .dnd-hover {
    background-color: #f8f8f8;
  }
</style>