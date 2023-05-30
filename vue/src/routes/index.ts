import front from './front'
import error from './error'
import system from './system'
import topic from './topic'
import lesson from './lesson'
import video from './video'
import sign from './sign'
import admin from './admin'
import config from './config'
import live from './live'
import morning from './morning'
import question from './question'
import shortVideo from './shortVideo'
import shot from './shot'
import subscribe from './subscribe'
import member from './member'
import wechat from './wechat'
import auth from './auth'
import soft from './soft'

export default [
  auth,
  ...admin,
  ...config,
  ...error,
  ...front,
  ...lesson,
  ...live,
  ...morning,
  ...question,
  ...shortVideo,
  ...shot,
  ...sign,
  ...subscribe,
  ...system,
  ...topic,
  ...member,
  ...video,
  ...wechat,
  ...soft,
]
