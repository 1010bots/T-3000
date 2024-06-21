# T-3000
## Replacing https://reinhart1010.id, one nanite at a time

<picture>
    <source src="public/img/icons/shell-blue-female-neutral.avif" type="image/avif">
    <source src="public/img/icons/shell-blue-female-neutral.heic" type="image/heic">
    <source src="public/img/icons/shell-blue-female-neutral.webp" type="image/webp">
    <source src="public/img/icons/shell-blue-female-neutral.png" type="image/png">
    <img src="public/img/icons/shell-blue-female-neutral.png" height="150">
</picture>

The original https://reinhart1010.id site was built using WordPress, a `($_ )`-ish (or `(>_ )` if you do Elementor, Shopify etc.) content management system that we chose back then due to its simplicity.

But now, we need to fine-tune our website not just to make it harder, better, faster, and stronger, but also to further achieve our ultimate goal: building one of the few websites that stands between:

+ Aesthetics and Simplicity
+ Centralization and Decentralization
+ Community and Corporations
+ Control and Freedom
+ Public and Private
+ Ownership and Sharing

We believe that products, software, and services would not be built without ideology, so is the Internet, a place where humans and machines of different ideologies come, whether to make friends or to fight.

Through this new website, we believe we can make friends with Apple fanboys, computer linguists, analytics-hungry corporations, hacker communities, people who are obsessed with ~~social media apps~~ **content recommendation engines (CREs)**, software developers, privacy-hungry purists, and so on. All through something we declare as ***Interface in Polymorphism***.

## Compatibility with Third-Party WordPress Plugins

This website is designed to be compatible with several third-party WordPress plugins.

- [ ] **[Jetpack](https://jetpack.com/) by [Automattic](https://automattic.com/)** - Related posts, post recommendations.
- [x] **[Post Kinds](https://wordpress.org/plugins/indieweb-post-kinds/) by [David Shanske](https://david.shanske.com/)** - Ability to tag [Indieweb-standard post kinds](https://indieweb.org/posts#Types_of_Posts).
  + The plugin also adds [microformats2](https://indieweb.org/microformats) support on certain WordPress themes. However, microformats2 is currently not yet implemented here.
- [x] **[Simple Local Avatars](https://wordpress.org/plugins/simple-local-avatars/) by [10up](https://10up.com/)** - Ability to use locally-uploaded photos as avatars; avoiding Gravatar entirely.
- [ ] **[Yoast SEO](https://yoast.com/)** - Alternative metadata provider for SEO.

As part of our [Computer System Multiculturalism initiative](https://reinhart1010.id/computer-system-multiculturalism), these plugins are not necessarily required in order for this Laravel project to work. We currently do not import JavaScript material from these third-party plugins for security reasons.

## JavaScript License Information

We are currently in progress of documenting JavaScript license in support for [GNU LibreJS](https://www.gnu.org/software/librejs/index.html). However, [due to the way Laravel Livewire works](https://livewire.laravel.com/docs/installation), many of these are ended up embedded inside the generated HTML content (instead of being referred into external links such as `https://reinhart1010.id/assets/js/index.js`).

Livewire-related scripts may also be blocked in GNU LibreJS due to missing license information. We decided to temporarily ignore the warning while migrating to Laravel 11 while considering to raise the issue upstream. Note that the project itself are available under the same MIT/Expat license, see <https://github.com/livewire/livewire/blob/main/LICENSE.md> for details.

If you are a GNU LibreJS user, you will need to use GNU LibreJS version 5.0 or later in order to support [JavaScript license information embedded as magnet links](https://www.gnu.org/software/librejs/free-your-javascript.html#magnet-link-license). Using magnet links allows us to optimize our website by shipping fewer JavaScript code.

## Contribution Notes

When reporting new issues, or Git commits, make sure you have included one of the following **shell signs**:

+ `(#_ )` for anything de-Googled Android, Linux, *Nix, privacy, security.
+ `(>_ )` for anything accessibility, Android, bot-friendliness, enterprise, legal, planning, systems & standards, Windows.
+ `($_ )` for anything Apple (iOS, iPadOS, macOS, etc.), art, UI/UX.

We use [semantic commits / Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/), btw.
