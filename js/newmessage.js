 var senderemail = $('#loggedinuseremail').text();
 var senderusername = $('#loggedinusername').text();
const userslink = '/get_users.php?username='.concat(senderemail);
const list_of_users = fetch(userslink)
  .then(response => response.json())
  .then(data => data)

console.log(list_of_users);
function openalert(){
	 
var recipients = {
    'Users': {
      'ubs@gmail.com': 'omkar',
      'alexmooz@gmail.com': 'Alex',
      'ayman_omc@yahoo.com': 'Aiman',
    },
    'Clubs': {
      1: 'Chess Club',
      2: 'Math Club',
      3: 'Dance Club'
    }
  };
 
 var selected = [];
 var selectedids = [];

 Swal.mixin({
  showCancelButton: true,
  cancelButtonText: 'Cancel <img src="https://img.icons8.com/fluent/48/000000/cancel.png" style="height: 30px;width: 30px;"/>',
  confirmButtonText: 'Next &rarr;',
  progressSteps: ['1', '2']
}).queue([
  {
  title: 'Select the user(s)',
  input: 'select',
  inputAttributes: {multiple:true},
  inputOptions: list_of_users,
  showCancelButton: true,
  didOpen: function ()
  {
	   
	  $('.swal2-select').select2({
		placeholder: "choose one or more",
		dropdownParent: $('.swal2-content'),
		width: '100%'
	  });
  },
   preConfirm: () => {
       
	  return [selected,selectedids];
  }
  },
 {
    title: 'Time to think💭',
    text: 'Enter your message',
	input : 'textarea',
	inputPlaceholder: 'Enter your message',
    html:'<input id="texttitle" placeholder="Enter title" class="swal2-input">', 
  preConfirm: (val) => {
	  if(val){
    return [
      document.getElementById('texttitle').value,val
    ]
	  }
  }
  }
]).then((result) => {
  if (result.value) {
    const answers = result.value
    if (selected.length==0|| !answers[1][0] || !answers[1][1])
    {
        Swal.fire("Empty data not allowed");
        return
    }
    Swal.fire({
      title: 'Review your message!',
      html: `<strong>To:</strong> <code>${answers[0][0]}</code><br>
        <strong>Title:</strong> <code>${answers[1][0]}</code> <br>
        <strong>Message:</strong> <code>${answers[1][1]}</code> `,
      showCancelButton: true,
	   cancelButtonText: 'Cancel <img src="https://img.icons8.com/fluent/48/000000/cancel.png" style="height: 30px;width: 30px;"/>',
	  confirmButtonText: 'Send it! <img src="https://img.icons8.com/dusk/64/000000/sent.png" style="height: 30px;width: 30px;"/>',
      showLoaderOnConfirm: true,
	  preConfirm: () => {
      return fetch(`/sendmessage.php?senderemail=${senderemail}&senderusername=${senderusername}&users=${selectedids}&title=${answers[1][0]}&messagecontent=${answers[1][1]}`)
      .then(response => {
        if (!response.ok) {
          throw new Error(response.statusText)
        }
        return "Message sent !!"
      })
      .catch(error => {
        Swal.showValidationMessage(
          `Message failed: ${error}`
        )
      })
  }
    }).then((messageresponse) => {
  if (messageresponse.value) {
	  const sent = messageresponse.value
    Swal.fire({
      title: `${sent}`,
	  imageUrl: '/images/sent2.gif'

    })
  }
})
  }
})
 
 $('.swal2-select').on('select2:unselect', function (e) {
    var data = e.params.data;
     selectedids.splice(selectedids.indexOf(data['id']), 1);
	 selected.splice(selected.indexOf(data['text']), 1);
	 console.log(data['text']);
	
});
$('.swal2-select').on('select2:select', function (e) {
    var data = e.params.data;
    selectedids.push(data['id']);
	selected.push(data['text']);
	console.log(data['text']);
	 
});
 
 }
 