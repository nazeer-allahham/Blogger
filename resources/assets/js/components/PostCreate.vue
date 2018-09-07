<template>
    <div class="col-8 mx-auto p-2 mb-2">
        <form method="POST" action="/posts" id="create-new-post">
            <input type="hidden" name="_token" :value="csrf">
            <div class="form-group">
                <img v-if="this.$props.gender ==='female'" src="../../img/female-user.png" class="rounded img-responsive img-thumbnail user-thumbnail">
                <img v-else src="../../img/male-user.png" class="rounded img-responsive img-thumbnail user-thumbnail">

                <textarea class="form-control post-body" name="body" placeholder="What's on your mind" style="padding:6px 60px;height:250px"></textarea>
                <div id="tags" class="mt-1">

                </div>
            </div>
        </form>
        <div class="d-flex align-items-center">
            <input type="text" class="border border-primary text-muted col-2 py-0 px-1 mr-1" id="new-tag-text" style="font-size:12px">
            <button type="button" class="btn btn-warning btn-sm py-0" onclick="addNewTag()">
                <span class="fa fa-tag"></span> Push Tag
            </button>
            

            <button type="submit" class="btn btn-primary btn-sm  py-0 ml-auto" onclick="event.preventDefault();
                                                                document.getElementById('create-new-post').submit();">
                Post <span class="fa fa-paper-plane"></span>
            </button>
        </div>
        <hr class="bg-dark py-1">
    </div>
</template>

<script>
export default {
    name: 'create-post',
    props: [
        'gender'
    ],
    data() {
        return {
            csrf : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    methods: {
        addNewTag() {
            
            if(document.getElementById('new-tag-text').value.length == 0)
            {
                return;
            }

            let item = '<input name="tags[]" value="' + document.getElementById('new-tag-text').value + '" type="text" class="btn btn-success btn-sm py-0 mr-1" readonly="readonly"/>';
            let parent = document.getElementById('tags');
            parent.innerHTML =  parent.innerHTML + item; 
            document.getElementById('tags_array').value += ' ' + document.getElementById('new-tag-text').value;
            document.getElementById('new-tag-text').value = "";
        }
    },
}
</script>

<style scoped>
.user-thumbnail {
    width: 48px;
    position: absolute;
    top: 12px;
    left: 12px;
}
</style>
