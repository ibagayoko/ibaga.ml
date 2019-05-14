<script type="text/ecmascript-6">


    export default {
        props: {
            className:String,
            name:String,
            workTitle:String,
            facebook:{default:()=>""},
            twitter:{default:()=>""},
            linkedin:{default:()=>""},
            email:{default:()=>""},
            phone:{default:()=>""},
            skype:{default:()=>""},
            whatsapp:{default:()=>""},
            malien:{default:()=>""},
            },

        data() {
            return {
            }
        },
        computed:{
            classes(){
                return {
                }
            }
        }
    }
</script>

<template>
    <MediaBody>
        <h4 classs="m-0">{{ name }}</h4>
        <p class="text-muted mb-0">{{ workTitle }}</p>
        <SocialNetworksList className="mb-0 mt-2">
            <!-- fbicon -->
            <ListItem inline v-if="facebook">
                <a :href="'facebook.com/'+facebook" v-tooltip.top="'Facebook'">
                    <Icon prefix="fa" name="facebook" />
                </a>
            </ListItem>
            <!-- twittericon -->
            <ListItem inline v-if="twitter">
                <a :href="'twitter.com/'+twitter" v-tooltip.top="'Twitter'">
                    <Icon prefix="fa" name="twitter" />
                </a>
            </ListItem>
            <!-- linkedinicon -->
            <ListItem inline v-if="linkedin">
                <a :href="'linkedin.com/in/'+linkedin" v-tooltip.top="'LinkedIn'">
                    <Icon prefix="fa" name="linkedin" />
                </a>
            </ListItem>
            <!-- emailicon -->
            <ListItem inline v-if="email">
                <a :href="'mailto:'+email" v-tooltip.top="'Email'">
                    <Icon prefix="fa" name="enveloppe" />
                </a>
            </ListItem>
            <!-- phoneicon -->
            <ListItem inline v-if="phone">
                <a :href="'tel:'+phone" v-tooltip.top="'phone'">
                    <Icon prefix="fa" name="phone" />
                </a>
            </ListItem>

        </SocialNetworksList>
        <slot/>
    </MediaBody>
</template>