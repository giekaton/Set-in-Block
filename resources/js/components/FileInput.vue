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

    <div style="text-align:center;">
      <div style="width: 60px; height: 60px; margin: 0px auto;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve" style="fill: rgb(85, 85, 85);"><g><g><path d="M78.904,63.18l-7.894-7.894l5.858-2.844c0.401-0.192,0.642-0.609,0.615-1.054c-0.022-0.445-0.318-0.829-0.736-0.972    l-9.558-3.288V27.902h2.377c0.609,0,1.098-0.489,1.098-1.098c0-0.604-0.489-1.098-1.098-1.098h-2.377V15.319    c0-0.609-0.494-1.098-1.098-1.098H20.134c-0.609,0-1.098,0.489-1.098,1.098v10.387h-2.542c-0.604,0-1.098,0.494-1.098,1.098    c0,0.609,0.494,1.098,1.098,1.098h2.542v25.89c0,0.604,0.489,1.098,1.098,1.098h37.019l3.87,11.249    c0.148,0.417,0.533,0.708,0.972,0.736c0.445,0.033,0.862-0.214,1.054-0.615l2.849-5.858l7.889,7.895    c0.209,0.203,0.489,0.318,0.78,0.318c0.055,0,0.115-0.005,0.17-0.016c0.033-0.006,0.066-0.011,0.099-0.022    c0.038-0.006,0.077-0.016,0.115-0.033c0.011,0,0.022-0.005,0.033-0.011c0.132-0.055,0.253-0.137,0.357-0.236l3.563-3.563    c0.203-0.203,0.324-0.483,0.324-0.774C79.227,63.669,79.107,63.389,78.904,63.18z M21.232,16.417h43.76v22.3L53.699,27.43    c-0.412-0.412-1.142-0.412-1.554,0L36.867,42.703l-5.111-5.106c-0.412-0.412-1.142-0.412-1.554,0l-8.971,8.965V16.417z     M21.232,52.694V49.67l9.75-9.745l5.111,5.111c0.412,0.412,1.136,0.412,1.548,0L52.92,29.758l12.072,12.067v4.546l-9.997-3.442    c-0.428-0.148-0.884-0.011-1.164,0.307c-0.005,0-0.005,0-0.011,0.005c-0.302,0.285-0.423,0.73-0.28,1.147l2.855,8.306H21.232z     M74.567,65.964l-8.207-8.207c-0.253-0.253-0.609-0.362-0.961-0.307c-0.351,0.06-0.648,0.285-0.807,0.604l-2.355,4.859    l-3.25-9.443c-0.011-0.038-0.022-0.071-0.038-0.104l-2.63-7.653l17.2,5.918l-4.853,2.355c-0.324,0.154-0.549,0.456-0.604,0.807    c-0.06,0.351,0.055,0.708,0.302,0.961l8.213,8.207L74.567,65.964z"></path> <path d="M75.341,68.297c-0.104,0.104-0.225,0.187-0.357,0.236C75.116,68.478,75.236,68.396,75.341,68.297z"></path></g></g><g><g><path d="M83.595,27.904h-7.013c-0.606,0-1.098-0.492-1.098-1.098s0.492-1.098,1.098-1.098h7.013c0.606,0,1.098,0.492,1.098,1.098    S84.201,27.904,83.595,27.904z"></path></g> <g><path d="M93.902,31.198c-0.606,0-1.098-0.492-1.098-1.098v-2.196h-2.196c-0.606,0-1.098-0.492-1.098-1.098    s0.492-1.098,1.098-1.098h3.294c0.606,0,1.098,0.492,1.098,1.098V30.1C95,30.707,94.508,31.198,93.902,31.198z"></path></g> <g><path d="M93.902,75.158c-0.606,0-1.098-0.492-1.098-1.098v-7.326c0-0.606,0.492-1.098,1.098-1.098S95,66.127,95,66.734v7.326    C95,74.667,94.508,75.158,93.902,75.158z M93.902,60.505c-0.606,0-1.098-0.492-1.098-1.098V52.08c0-0.606,0.492-1.098,1.098-1.098    S95,51.474,95,52.08v7.327C95,60.013,94.508,60.505,93.902,60.505z M93.902,45.852c-0.606,0-1.098-0.492-1.098-1.098v-7.327    c0-0.606,0.492-1.098,1.098-1.098S95,36.821,95,37.427v7.327C95,45.36,94.508,45.852,93.902,45.852z"></path></g> <g><path d="M93.902,85.779h-3.294c-0.606,0-1.098-0.492-1.098-1.098c0-0.606,0.492-1.098,1.098-1.098h2.196v-2.196    c0-0.606,0.492-1.098,1.098-1.098S95,80.781,95,81.387v3.294C95,85.287,94.508,85.779,93.902,85.779z"></path></g> <g><path d="M84.361,85.779h-6.247c-0.606,0-1.098-0.492-1.098-1.098c0-0.606,0.492-1.098,1.098-1.098h6.247    c0.606,0,1.098,0.492,1.098,1.098C85.459,85.287,84.967,85.779,84.361,85.779z M71.866,85.779h-6.247    c-0.606,0-1.098-0.492-1.098-1.098c0-0.606,0.492-1.098,1.098-1.098h6.247c0.606,0,1.098,0.492,1.098,1.098    C72.964,85.287,72.472,85.779,71.866,85.779z M59.371,85.779h-6.247c-0.606,0-1.098-0.492-1.098-1.098    c0-0.606,0.492-1.098,1.098-1.098h6.247c0.606,0,1.098,0.492,1.098,1.098C60.469,85.287,59.977,85.779,59.371,85.779z     M46.876,85.779h-6.247c-0.606,0-1.098-0.492-1.098-1.098c0-0.606,0.492-1.098,1.098-1.098h6.247c0.606,0,1.098,0.492,1.098,1.098    C47.974,85.287,47.483,85.779,46.876,85.779z M34.382,85.779h-6.247c-0.606,0-1.098-0.492-1.098-1.098    c0-0.606,0.492-1.098,1.098-1.098h6.247c0.606,0,1.098,0.492,1.098,1.098C35.48,85.287,34.988,85.779,34.382,85.779z     M21.887,85.779h-6.247c-0.606,0-1.098-0.492-1.098-1.098c0-0.606,0.492-1.098,1.098-1.098h6.247c0.606,0,1.098,0.492,1.098,1.098    C22.985,85.287,22.493,85.779,21.887,85.779z"></path></g> <g><path d="M9.392,85.779H6.098C5.492,85.779,5,85.287,5,84.681v-3.294c0-0.606,0.492-1.098,1.098-1.098s1.098,0.492,1.098,1.098    v2.196h2.196c0.606,0,1.098,0.492,1.098,1.098C10.49,85.287,9.998,85.779,9.392,85.779z"></path></g><g><path d="M6.098,75.158C5.492,75.158,5,74.667,5,74.06v-7.327c0-0.606,0.492-1.098,1.098-1.098s1.098,0.492,1.098,1.098v7.327    C7.196,74.667,6.704,75.158,6.098,75.158z M6.098,60.505C5.492,60.505,5,60.013,5,59.407V52.08c0-0.606,0.492-1.098,1.098-1.098    s1.098,0.492,1.098,1.098v7.327C7.196,60.013,6.704,60.505,6.098,60.505z M6.098,45.851C5.492,45.851,5,45.36,5,44.753v-7.326    c0-0.606,0.492-1.098,1.098-1.098s1.098,0.492,1.098,1.098v7.326C7.196,45.36,6.704,45.851,6.098,45.851z"></path></g> <g><path d="M6.098,31.198C5.492,31.198,5,30.707,5,30.1v-3.294c0-0.606,0.492-1.098,1.098-1.098h3.294    c0.606,0,1.098,0.492,1.098,1.098s-0.492,1.098-1.098,1.098H7.196V30.1C7.196,30.707,6.704,31.198,6.098,31.198z"></path></g></g><g><g><path d="M33.603,32.895c-2.999,0-5.438-2.44-5.438-5.438c0-2.999,2.44-5.438,5.438-5.438s5.438,2.44,5.438,5.438    C39.041,30.455,36.602,32.895,33.603,32.895z M33.603,24.214c-1.788,0-3.242,1.455-3.242,3.242c0,1.788,1.455,3.242,3.242,3.242    c1.788,0,3.242-1.455,3.242-3.242C36.845,25.669,35.391,24.214,33.603,24.214z"></path></g></g></svg></div>
      <input type="file" id="file_input" style="display:none;" @change="file_input_event">
      <div style="height:5px;"></div>
      {{ text }}
      <div style="height:5px;"></div>
    </div>
    
  </div>

</div>
</template>

<script>
  var data = {
    text: 'Click to select or drag and drop files...',
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