<template>
    <div class="comment-item">
        <div class="d-flex w-100 justify-content-between">
            <div class="comment-info">
                <div class="comment-name">
                    {{ this.comment.username }}
                </div>
                <div class="comment-date">
                    {{ this.dateFormat }}
                </div>
                <div class="comment-star">
                    <div class="stars-outer">
                        <div class="stars-inner" :style="{ width: this.pointPercent + '%'}"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment-content">
            {{ this.comment.pivot.comment }}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            comment: {
                type: Object,
                default: {},
            }
        },
        computed: {
            pointPercent() {
                return this.comment.pivot.point / 5 * 100;
            },
            dateFormat() {
                return this.comment.updated_at.slice(0, 10);
            }
        }
    }
</script>

<style>
</style>