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
             <a :href="postHref">
        <img className="card-img-top" :src="imgSrc" :alt="imgAlt" />
        </a>
      <CardBody className="d-flex flex-column">
        <h4>
          <a :href="postHref">{{title}}</a>
        </h4>
        <div className="text-muted">{{description}}</div>
        <div className="d-flex align-items-center pt-5 mt-auto">
          <div
            className="avatar avatar-md mr-3"
            v-bind:style="{ backgroundImage: `url(${avatarImgSrc}` }"
          />
          <div>
            <a :href="profileHref" className="text-default">
              {{authorName}}
            </a>
            <small className="d-block text-muted">{{date}}</small>
          </div>
          <div className="ml-auto text-muted">
            <a :href="iconHref" className="icon d-none d-md-inline-block ml-3">
              <Icon prefix="fe" :name="iconNameL" />
            </a>
          </div>
        </div>
      </CardBody>
        </Card>
        <Card v-else className="card-aside">
      <a
        :href="postHref"
        className="card-aside-column"
        v-bind:style="{ backgroundImage: `url(${imgSrc})` }"
      >
        {{""}}
      </a>
      <CardBody className="d-flex flex-column">
        <h4>
          <a :href="postHref">{{title}}</a>
        </h4>
        <div className="text-muted">{{ description}}</div>
        <div className="d-flex align-items-center pt-5 mt-auto">
          <div
            className="avatar avatar-md mr-3"
            v-bind:style="{ backgroundImage: `url(${avatarImgSrc}` }"
          />
          <div>
            <a :href="profileHref" className="text-default">
              {{authorName}}
            </a>
            <small className="d-block text-muted">{{date}}</small>
          </div>
          <div className="ml-auto text-red">
            <a :href="iconHref" className="icon d-none d-md-inline-block ml-3">
              <Icon prefix="fe" :name="iconNameL" />
            </a>
          </div>
        </div>
      </CardBody>

        </Card>
</template>