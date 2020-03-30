//<user-post avatar_path="51.505" username="-0.09" time="" user_id="500" text="500" image="13" map="" likes_count=""></user-post>

class post extends HTMLElement {
    constructor() {
        super()
        this.post_id = this.getAttribute('post-id');
        this.avatar_path = this.getAttribute('avatar_path')
        this.username = this.getAttribute('username')
        this.user_id = this.getAttribute('user_id')
        this.time = this.getAttribute('time')
        this.like = this.getAttribute('likes_count')
        this.text = this.getAttribute('text')
        this.image = this.getAttribute('image')
        this.popup = this.getAttribute('p')
        this.map = this.getAttribute("map");
        this.comments = this.innerHTML;

        let map = '';
        if(this.map != '')
            map = 'at ' + this.map;
        let image = '';
        if (this.image != '')
            image = `<div class="card-body-custom"><img class="card-img-top rounded-0" src="` + this.image + `" alt="Card image cap"></div>`;
        this.innerHTML = `
        <div class="card my-3">
        <div class="card-header bg-white border-0 py-2">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-between">
                    <a href="#">
                        <img class="rounded-circle" src="` + this.avatar_path + `" width="45" alt="">
                    </a>
                    <div class="ml-3">
                        <div class="h6 m-0">
                            <a href="#">` + this.username + `</a>
                        </div>
                        <div class="text-muted h8">` + this.time + '  ' + map + ` <i class="fa fa-globe" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a onclick="deletePost(` + this.post_id + `)" class="dropdown-item" href="#">Delete post</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body pt-0 pb-2">
        ` + this.text + `
        </div>
        
        ` + image + `
        
        <div class="card-footer bg-white border-0 p-0">
            <div class="d-flex justify-content-between align-items-center py-2 mx-3 border-bottom">
                <div>

                </div>
                <div class="h7"> ` + this.like + `</div>
            </div>
            <div class="d-flex justify-content-between align-items-center my-1">
                <div class="col">
                    <button type="button" class="btn btn-fbook btn-block btn-sm"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> Like </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-fbook btn-block btn-sm"><i class="fa fa-comment" aria-hidden="true"></i> Comment </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-fbook btn-block btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Share </button>
                </div>
            </div>
        </div>
    </div>
    `;

    }

}
customElements.define('user-post', post);