<template>
    <div class="review__wrapper">
        <div class="review__header">Đánh giá sản phẩm</div>
        <div class="row review__main">
            <div class="col col-7">
                <div class="review-point__wrapper">
                    <div class="d-flex justify-content-center">
                        <div class="point-wrapper">
                            <div class="point-label">Overall</div>
                            <div class="point-content">{{ this.productInfo.diemDanhGia }}</div>
                            <div class="point-star">
                                <div class="stars-outer">
                                    <div class="stars-inner" :style="{ width: this.diemDanhGiaPercent + '%'}"></div>
                                </div>
                            </div>
                            <div class="point-quantity">({{ this.productInfo.luotDanhGia }} Rates)</div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="comment-label">All Comments !</div>
                        <div v-if="this.productReviewList">
                            <CommentItem v-for="(comment, index) in this.productReviewList" :key="index" :comment="comment"></CommentItem>
                        </div>
                        <div v-else>
                            <img src="{{ asset('images/shop/empty-invoice.webp') }}" alt="empty">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-5">
                <div class="review-post-wrapper">
                    <div class="review-post-label">Product Review !</div>
                    <div class="star-post-wrapper">
                        <span class="star-post-text">Your rating point: </span>
                        <div class="star-post">
                            <i class="fa-solid fa-star star-post-icon" :class="{'star-post-icon--active': starActived[0]}" @click="setPoint(1)"></i>
                            <i class="fa-solid fa-star star-post-icon" :class="{'star-post-icon--active': starActived[1]}" @click="setPoint(2)"></i>
                            <i class="fa-solid fa-star star-post-icon" :class="{'star-post-icon--active': starActived[2]}" @click="setPoint(3)"></i>
                            <i class="fa-solid fa-star star-post-icon" :class="{'star-post-icon--active': starActived[3]}" @click="setPoint(4)"></i>
                            <i class="fa-solid fa-star star-post-icon" :class="{'star-post-icon--active': starActived[4]}" @click="setPoint(5)"></i>
                        </div>
                    </div>
                    <div class="comment-post-wrapper">
                        <div class="comment-post-text">Your comment:</div>
                        <div v-if="this.isLogged">
                            <div v-if="this.hasReviewed">
                                <textarea rows="6" class="comment-input" spellcheck="false" v-model="comment"></textarea>
                                <button class="post-btn post-btn-update" @click="this.postComment">Update Review</button>
                                <button class="post-btn post-btn-delete" @click="this.deleteComment">Delete Review</button>
                            </div>
                            <div v-else>
                                <textarea rows="6" class="comment-input" spellcheck="false" v-model="comment"></textarea>
                                <button class="post-btn post-btn-success" @click="this.postComment">Send Review</button>
                            </div>
                        </div>
                        <div v-else>
                            <textarea rows="6" class="comment-input" spellcheck="false" v-model="comment"></textarea>
                            <button class="post-btn post-btn-disabled">Please login to continue !</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toast Message -->
        <div class="add-toast-vue add-toast-special-vue" v-show="this.toastActive">
            <div class="add-toast-text-vue">{{ this.message }}</div>
            <div class="add-toast-btn-vue" @click="this.toastActive = false"><i class="fa-solid fa-xmark"></i></div>
        </div>
        <!-- End Toast Message -->
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import CommentItem from './CommentItem.vue';
    export default {
        components: {
            CommentItem,
            CommentItem
        },
        props: {
            product_id: {
                type: Number,
                required: true,
            }
        },  
        data() {
            return {
                point: 0,
                starActived: [false, false, false, false, false],
                comment: '',
                toastActive: false,
            }
        },
        async created() {
            await this.created();
        },  
        methods: {
            ...mapActions(['fetchCurrentUser', 'fetchProductReviewInfo', 'postReview', 'deleteReview']),

            async created() {
                await this.fetchCurrentUser(this.product_id);
                await this.fetchProductReviewInfo(this.product_id);
                if (this.hasReviewed) {
                    this.comment = this.userReview.comment;
                    this.setPoint(this.userReview.point);
                }
            },

            setPoint(point) {
                for (let i = 0; i < point; ++i)
                    this.starActived[i] = true;

                for (let i = point; i < 5; ++i)
                    this.starActived[i] = false;
                
                this.point = point;
            },

            async postComment() {
                await this.postReview({
                    id: this.product_id,
                    comment: this.comment,
                    point: this.point,
                });
                if (this.message != '')
                    this.toastActive = true;
            },

            async deleteComment() {
                await this.deleteReview(this.product_id);
                this.comment = '';
                this.setPoint(0);
                if (this.message != '')
                    this.toastActive = true;
            }
        },
        computed: {
            ...mapGetters(['message', 'productInfo', 'productReviewList', 'isLogged', 'hasReviewed', 'userReview']),

            diemDanhGiaPercent() {
                return this.productInfo.diemDanhGia / 5 * 100;
            },
        }
    }
</script>

<style lang="scss" scoped>
.add-toast-vue {
    position: fixed;
    top: 32px;
    right: 32px;
    z-index: 1001;
    color: white;
    padding: 6px 18px 12px 32px;
    font-size: 20px;
    display: flex;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 4px;
    animation: appear 500ms both 0s;

    .add-toast-text-vue {
        margin-right: 18px;
    }

    .add-toast-btn-vue {
        padding: 4px;

        &:hover {
            cursor: pointer;
            color: #333;
        }
    }

    &.add-toast-special-vue {
        align-items: center;
        padding: 12px 32px;
        background-color: #4158D0;
        background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
    }

    @keyframes appear {
        from {
            opacity: 0;
            transform: translateX(calc(100% + 18px));
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
}
</style>