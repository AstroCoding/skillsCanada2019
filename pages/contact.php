<div class="container-fluid mt-4 mb-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-2">
        <div class="card-header">
          <h4 class="card-title">Contact Us!</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Do you need to get in contact with us? Take a look at some of you options below or visit the locations page for restaurant specific contact information.</p>
        </div>
      </div>
      <div class="card-columns mb-2">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Phone Number</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Our company phone number is <a href="#">555.123.4567</a></p>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">In Person</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Feel free to visit any of our locations and ask to speak with a manager. We won't turn you away and will listen no matter the issue.</p>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Email</h4>
          </div>
          <div class="card-body">
            <p class="card-text">To email us with an enquiry, email <a href="#">exampleemail@gmail.com</a><br>
            or use the contact form below.</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Contact Form</h4>
        </div>
        <div class="card-body">
          <form action="./?emailForm" method="POST">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject of Your Email" required>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <input type="text" class="form-control" name="message" id="message" placeholder="What would you like to tell us?" required>
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Your Email" required>
              <small id="emailHelpId" class="form-text text-muted">We ask for your email so we can contact you if needed. We do not share any of the information in which we have requested from you today.</small>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-primary" value="SUBMIT">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>