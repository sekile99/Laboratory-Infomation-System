<style type="text/css">
*,
*:before,
*:after {
    box-sizing: border-box;
}

.container {
    margin: 0 auto;
    width: 100%;
    height: auto;
    background: #444753;
    border-radius: 5px;
}

.people-list {
    width: 30%;
    float: left;
}

.people-list .search {
    padding: 20px;
}

.people-list input {
    border-radius: 3px;
    border: none;
    padding: 14px;
    color: white;
    background: #6A6C75;
    width: 90%;
    font-size: 14px;
}

.people-list .fa-search {
    position: relative;
    left: -25px;
}

.people-list ul {
    padding: 20px;
    height: 770px;
    list-style: none;
}

.people-list ul li {
    padding-bottom: 20px;
}

.people-list img {
    float: left;
    height: 50px;
    width: 50px;
    border-radius: 50px;
}

.people-list .about {
    float: left;
    margin-top: 8px;
}

.people-list .about {
    padding-left: 8px;
}

.people-list .status {
    color: #92959E
}

.chat {
    width: 70%;
    float: left;
    background: #F2F5F8;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    color: #434651;
}

.chat .chat-header {
    padding: 20px;
    border-bottom: 2px solid white;
}

.chat .chat-header img {
    float: left;
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px;
    margin-top: 6px;
}

.chat .chat-header .chat-with {
    font-weight: bold;
    font-size: 16px;
}

.chat .chat-header .chat-num-messages {
    color: #92959E;
}

.chat .chat-header .fa-star {
    float: right;
    color: #D8DADF;
    font-size: 20px;
    margin-top: 12px;
}

.chat .chat-history {
    padding: 30px 30px 20px;
    border-bottom: 2px solid white;
    overflow-y: scroll;
    height: 575px;
}

.chat .chat-history .message-data {
    margin-bottom: 15px;
}

.chat-history ul {
    list-style-type: none;
}

.chat .chat-history .message-data-time {
    color: #a8aab1;
    padding-left: 6px;
}

.chat .chat-history .message {
    color: white;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    margin-bottom: 30px;
    width: 90%;
    position: relative;
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #86BB71;
    border-width: 10px;
    margin-left: -10px;
}

.chat .chat-history .my-message {
    background: #86BB71;
}

.chat .chat-history .other-message {
    background: #94C2ED;
}

.chat .chat-history .other-message:after {
    border-bottom-color: #94C2ED;
    left: 93%;
}

.chat .chat-message {
    padding: 30px;
}

.chat .chat-message textarea {
    width: 90%;
    border: 1px solid #868871;
    padding: 10px 20px;
    font: 14px/22px "Lato", Arial, sans-serif;
    margin-bottom: 10px;
    border-radius: 5px;
    resize: none;
}

.chat .chat-message .fa-file-o,
.chat .chat-message .fa-file-image-o {
    font-size: 16px;
    color: gray;
    cursor: pointer;
}

.chat .chat-message button {
    float: right;
    color: #94C2ED;
    font-size: 16px;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    font-weight: bold;
    background: #F2F5F8;
}

.chat .chat-message button:hover {
    color: #75b1e8;
}

.online,
.offline,
.me {
    margin-right: 3px;
    font-size: 10px;
}

.online {
    color: #86BB71;
}

.offline {
    color: #E38968;
}

.me {
    color: #94C2ED;
}

.align-left {
    text-align: left;
}

.align-right {
    text-align: right;
}

.float-right {
    float: right;
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-inbox" aria-hidden="true"></i> Chat
        </h1>
    </section>
    <section class="content">
        <div class="container clearfix">
            <div class="people-list" id="people-list">
                <div class="search">
                    <input type="text" placeholder="search" />
                    <i class="fa fa-search"></i>
                </div>
                <ul class="list">
                    <li class="clearfix">
                        <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" alt="avatar" />
                        <div class="about">
                            <div class="name">Lr. Hamad</div>
                            <div class="status">
                                <i class="fa fa-circle online"></i> online
                            </div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" alt="avatar" />
                        <div class="about">
                            <div class="name">OD17 Class</div>
                            <div class="status">
                                <i class="fa fa-circle online"></i> Active chats
                            </div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" alt="avatar" />
                        <div class="about">
                            <div class="name">Madam Halima</div>
                            <div class="status">
                                <i class="fa fa-circle online"></i> online
                            </div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" alt="avatar" />
                        <div class="about">
                            <div class="name">Joshua Mang'era</div>
                            <div class="status">
                                <i class="fa fa-circle online"></i> online
                            </div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" alt="avatar" />
                        <div class="about">
                            <div class="name">Paul Titus</div>
                            <div class="status">
                                <i class="fa fa-circle online"></i> online
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="chat">
                <div class="chat-header clearfix">
                    <img src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" height="50" width="50"
                        style="border-radius: 50px;" alt="avatar" />

                    <div class="chat-about">
                        <div class="chat-with">Chat with Lr. Hamad</div>
                        <div class="chat-num-messages">already 10 messages</div>
                    </div>
                    <i class="fa fa-star"></i>
                </div> <!-- end chat-header -->

                <div class="chat-history">
                    <ul>
                        <li class="clearfix">
                            <div class="message-data align-right">
                                <span class="message-data-time">10:10 AM, Today</span> &nbsp; &nbsp;
                                <span class="message-data-name">David Sekile</span> <i class="fa fa-circle me"></i>

                            </div>
                            <div class="message other-message float-right">
                                Hi Lr. Hamad, how are you? How is the project coming along?
                            </div>
                        </li>

                        <li>
                            <div class="message-data">
                                <span class="message-data-name"><i class="fa fa-circle online"></i> Lr. Hamad</span>
                                <span class="message-data-time">10:12 AM, Today</span>
                            </div>
                            <div class="message my-message">
                                Are we meeting today? Project has been already finished and I have results to show you.
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="message-data align-right">
                                <span class="message-data-time">10:14 AM, Today</span> &nbsp; &nbsp;
                                <span class="message-data-name">David Sekile</span> <i class="fa fa-circle me"></i>

                            </div>
                            <div class="message other-message float-right">
                                Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so? Have
                                you faced any problems at the last phase of the project?
                            </div>
                        </li>

                        <li>
                            <div class="message-data">
                                <span class="message-data-name"><i class="fa fa-circle online"></i> Lr. Hamad</span>
                                <span class="message-data-time">10:20 AM, Today</span>
                            </div>
                            <div class="message my-message">
                                Actually everything was fine. I'm very excited to show this to our team.
                            </div>
                        </li>
                    </ul>

                </div> <!-- end chat-history -->

                <div class="chat-message clearfix">
                    <textarea name="message-to-send" id="message-to-send" placeholder="Type your message"
                        rows="3"></textarea>
                    <a class="btn btn-md btn-success" style="float: right;"><i class="fa fa-paper-plane"></i>
                        Send</a>

                </div> <!-- end chat-message -->

            </div> <!-- end chat -->

        </div> <!-- end container -->

        <script id="message-template" type="text/x-handlebars-template">
            <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
      <span class="message-data-name" >David Sekile</span> <i class="fa fa-circle me"></i>
    </div>
    <div class="message other-message float-right">
      {{messageOutput}}
    </div>
  </li>
</script>

        <script id="message-response-template" type="text/x-handlebars-template">
            <li>
    <div class="message-data">
      <span class="message-data-name"><i class="fa fa-circle online"></i> Lr. Hamad</span>
      <span class="message-data-time">{{time}}, Today</span>
    </div>
    <div class="message my-message">
      {{response}}
    </div>
  </li>
</script>
    </section>
</div>
<script type="text/javascript">
(function() {
    var chat = {
        messageToSend: "",
        messageResponses: [
            "Why did the web developer leave the restaurant? Because of the table layout.",
            "How do you comfort a JavaScript bug? You console it.",
            'An SQL query enters a bar, approaches two tables and asks: "May I join you?"',
            "What is the most used language in programming? Profanity.",
            "What is the object-oriented way to become wealthy? Inheritance.",
            "An SEO expert walks into a bar, bars, pub, tavern, public house, Irish pub, drinks, beer, alcohol"
        ],
        init: function() {
            this.cacheDOM();
            this.bindEvents();
            this.render();
        },
        cacheDOM: function() {
            this.$chatHistory = $(".chat-history");
            this.$button = $("button");
            this.$textarea = $("#message-to-send");
            this.$chatHistoryList = this.$chatHistory.find("ul");
        },
        bindEvents: function() {
            this.$button.on("click", this.addMessage.bind(this));
            this.$textarea.on("keyup", this.addMessageEnter.bind(this));
        },
        render: function() {
            this.scrollToBottom();
            if (this.messageToSend.trim() !== "") {
                var template = Handlebars.compile($("#message-template").html());
                var context = {
                    messageOutput: this.messageToSend,
                    time: this.getCurrentTime()
                };

                this.$chatHistoryList.append(template(context));
                this.scrollToBottom();
                this.$textarea.val("");

                // responses
                var templateResponse = Handlebars.compile(
                    $("#message-response-template").html()
                );
                var contextResponse = {
                    response: this.getRandomItem(this.messageResponses),
                    time: this.getCurrentTime()
                };

                setTimeout(
                    function() {
                        this.$chatHistoryList.append(templateResponse(contextResponse));
                        this.scrollToBottom();
                    }.bind(this),
                    1500
                );
            }
        },

        addMessage: function() {
            this.messageToSend = this.$textarea.val();
            this.render();
        },
        addMessageEnter: function(event) {
            // enter was pressed
            if (event.keyCode === 13) {
                this.addMessage();
            }
        },
        scrollToBottom: function() {
            this.$chatHistory.scrollTop(this.$chatHistory[0].scrollHeight);
        },
        getCurrentTime: function() {
            return new Date()
                .toLocaleTimeString()
                .replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
        },
        getRandomItem: function(arr) {
            return arr[Math.floor(Math.random() * arr.length)];
        }
    };

    chat.init();

    var searchFilter = {
        options: {
            valueNames: ["name"]
        },
        init: function() {
            var userList = new List("people-list", this.options);
            var noItems = $('<li id="no-items-found">No items found</li>');

            userList.on("updated", function(list) {
                if (list.matchingItems.length === 0) {
                    $(list.list).append(noItems);
                } else {
                    noItems.detach();
                }
            });
        }
    };

    searchFilter.init();
})();
</script>