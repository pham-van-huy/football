<template>
    <div class="panel panel-default style-chat">
        <div class="panel-heading">
            Admin
            <span :class="{
                glyphicon: true,
                'glyphicon-plus': !isShow,
                'glyphicon-minus' : isShow,
                'close-show': true
                }"
                @click="showOrClose()">
            </span>
        </div>
        <div class="panel-body" v-show="isShow">
            <p>AAAAAAAAAAAAAAAA</p>
            <p>AAAAAAAAAAAAAAAA</p>
            <p>AAAAAAAAAAAAAAAA</p>
            <p>AAAAAAAAAAAAAAAA</p>
        </div>
        <div class="panel-footer" v-show="isShow">
            <textarea
                class='input-message form-control'
                placeholder="Enter message and press Enter to send..."
                rows="2">
            </textarea>
        </div>
    </div>
</template>
<script type="text/javascript">
    export default {
        data: () => ({
            isShow: true
        }),

        methods: {
            showOrClose() {
                this.isShow = !this.isShow
            }
        }
    }
</script>

<style lang="scss">
    .style-chat {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 300px;
        margin-bottom: 0px;
        border: 0px solid #fff;
        .panel-heading {
            color: #ffffff;
            background-color: #153764;
            border-color: #153764;
            font-weight: 600;
            padding: 2px 15px;
            .close-show {
                float: right;
                padding-top: 3px;
            }
        }
        .panel-body {
            height: 250px;
            overflow-x: hidden;
            overflow-y: scroll;
            padding: 0px 15px;
        }
        .panel-footer {
            padding: 0px 0px 2px;
        }
    }
</style>
