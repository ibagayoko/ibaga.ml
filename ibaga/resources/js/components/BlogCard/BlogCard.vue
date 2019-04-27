<script type="text/ecmascript">
import Card from "../Card/Card";
import CardBody from "../Card/CardBody";
import Icon from "../Icon/Icon";
    export default  {
        components: {
            Card,
            CardBody,
            Icon
        },
        name: 'BlogCard',
        props: [ 
            "title",
            "description",
            "avatarUrl",
            "imgUrl",
            "imgAlt",
            "aside",
            "authorName",
            "date",
            "imgSrc",
            "avatarImgSrc",
            "iconName",
            "iconHref",
            "postHref",
            "profileHref",
        ],
        data() {
            return {
                iconNameL:this.iconName || "heart"
            }
        },
        mounted() {
        },
        methods: {},
    }
</script>

<template>
        <Card v-if="aside">
             <template v-slot:children>
             <a :href="postHref">
        <img class="card-img-top" :src="imgSrc" :alt="imgAlt" />
        </a>
      <CardBody class-name="d-flex flex-column">
        <h4>
          <a :href="postHref">{{ title }}</a>
        </h4>
        <div class="text-muted">{{description}}</div>
        <div class="d-flex align-items-center pt-5 mt-auto">
          <div
            class="avatar avatar-md mr-3"
            v-bind:style="{ backgroundImage: `url(${avatarImgSrc}` }"
          />
          <div>
            <a :href="profileHref" class="text-default">
              {{authorName}}
            </a>
            <small class="d-block text-muted">{{date}}</small>
          </div>
          <div class="ml-auto text-muted">
            <a :href="iconHref" class="icon d-none d-md-inline-block ml-3">
              <Icon prefix="fe" :name="iconNameL" />
            </a>
          </div>
        </div>
      </CardBody>
      </template>
        </Card>
        <Card v-else className="card-aside">
            <template v-slot:children>
      <a
        :href="postHref"
        class="card-aside-column"
        v-bind:style="{ backgroundImage: `url(${imgSrc})` }"
      >
        {{""}}
      </a>
      <CardBody class="d-flex flex-column">
        <h4>
          <a :href="postHref">{{title}}</a>
        </h4>
        <div class="text-muted">{{ description}}</div>
        <div class="d-flex align-items-center pt-5 mt-auto">
          <div
            class="avatar avatar-md mr-3"
            v-bind:style="{ backgroundImage: `url(${avatarImgSrc}` }"
          />
          <div>
            <a :href="profileHref" class="text-default">
              {{authorName}}
            </a>
            <small class="d-block text-muted">{{date}}</small>
          </div>
          <div class="ml-auto text-red">
            <a :href="iconHref" class="icon d-none d-md-inline-block ml-3">
              <Icon prefix="fe" :name="iconNameL" />
            </a>
          </div>
        </div>
      </CardBody>
 </template>
        </Card>
</template>