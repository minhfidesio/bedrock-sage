/*
 * @file
 *
 * Creates and attach favicon files.
 *
 */

const config = require('../../frontendboilerplate-configuration'),
    log = require('../lib/log'),
    image = require('../lib/image'),
    prompt = require('prompt'),
    os = require('os'),
    upath = require('upath'),
    notifier = require('node-notifier'),
    pjson = require('../../../package.json'),
    favicons = require('favicons'),
    fs = require('fs-extra'),
    events = require('events'),
    _ = require('lodash'),
    rls = require('remove-leading-slash');

module.exports = function (done) {
    var success = true;
    var schema = {
        properties: {
            'yes/no': {
                pattern: /^yes|no|y|n|YES|NO|Y|N+$/,
                type: 'string',
                message: 'We didn\'t understand your answer.',
                required: true
            }
        }
    };
    log.info(os.EOL + 'Project\'s short name is : ' + config.project_short_name + os.EOL + 'Langage code is : ' + config.project_lang + os.EOL + 'Source file is : ' + rls(config.generateFavicon.src) + os.EOL + 'Output directory is : ' + rls(config.generateFavicon.output) + os.EOL + 'Favicon\s main color is : ' + config.generateFavicon.main_color + os.EOL + os.EOL + 'Do you confirm?');
    prompt.start();
    prompt.get(schema, function (err, result) {
        if (err) {
            err = '' + err;
            success = false;
            if (!_.includes(err, 'Error: canceled')) {
                console.log(os.EOL);
                log.error(err);
                console.log(os.EOL);
            }
            done(success);
            prompt.stop();
        } else {
            if (result['yes/no'].match(/^yes|y|YES|Y+$/) != null) {
                log.info('Optimising generated favicons may take some time (1 to 2 minutes).');
                log.info('Do you want to optimise generated images?');
                prompt.start();
                prompt.get(schema, function (err, result) {
                    if (err) {
                        err = '' + err;
                        success = false;
                        if (!_.includes(err, 'Error: canceled')) {
                            console.log(os.EOL);
                            log.error(err);
                            console.log(os.EOL);
                        }
                        done(success);
                        prompt.stop();
                    } else {
                        var minify = false;
                        if (result['yes/no'].match(/^yes|y|YES|Y+$/) != null) {
                            minify = true;
                        }
                        log.info('Starting favicons generation...');
                        favicons(rls(config.generateFavicon.src), {
                            path: '/' + upath.relative(rls(config.project_root_directory), rls(config.generateFavicon.output)),
                            appName: config.project_short_name,
                            display: 'standalone',
                            orientation: 'any',
                            version: pjson.version,
                            replace: true,
                            dir: 'auto',
                            start_url: '/?utm_source=homescreen',
                            pipeHTML: false,
                            logging: true,
                            developerName: pjson.author.name,
                            developerURL: pjson.author.url,
                            background: 'transparent',
                            theme_color: config.generateFavicon.main_color,
                            lang: config.project_lang
                        }, function (error, response) {
                            if (error) {
                                log.error(error.message);
                                success = false;
                                done(success);
                                prompt.stop();
                            }
                            _.forIn(response.files, function (file) {
                                try {
                                    fs.outputFileSync(upath.join(rls(config.generateFavicon.output), file.name), file.contents);
                                } catch (err) {
                                    notifier.notify({
                                        title: 'Possible permission Error',
                                        message: 'Cannot update or create file. Please check permissions.',
                                        icon: './boilerplate-includes/core/images/fidesio-logo.png'
                                    });
                                    console.log(os.EOL);
                                    log.error(err);
                                    console.log(os.EOL);
                                    success = false;
                                    done(success);
                                    prompt.stop();
                                }
                            });
                            var images_compiled_count = 0;
                            _.forIn(response.images, function (file) {
                                try {
                                    fs.outputFileSync(upath.join(rls(config.generateFavicon.output), file.name), file.contents, {
                                        encoding: 'binary'
                                    });
                                    if (minify) {
                                        const eventEmitter = new events.EventEmitter();
                                        eventEmitter.on('finished', function (source) {
                                            images_compiled_count++;
                                            if (images_compiled_count == response.images.length) {
                                                done(success);
                                                prompt.stop();
                                            }
                                        });
                                        image.minify(upath.join(rls(config.generateFavicon.output), file.name), true, true, eventEmitter);
                                    } else {
                                        images_compiled_count++;
                                    }
                                } catch (err) {
                                    notifier.notify({
                                        title: 'Possible permission Error',
                                        message: 'Cannot update or create image. Please check permissions.',
                                        icon: './boilerplate-includes/core/images/fidesio-logo.png'
                                    });
                                    console.log(os.EOL);
                                    log.error(err);
                                    console.log(os.EOL);
                                    success = false;
                                    done(success);
                                    prompt.stop();
                                }
                            });
                            if (images_compiled_count == response.images.length) {
                                done(success);
                                prompt.stop();
                            }
                        });
                    }
                });
            } else {
                done(success);
                prompt.stop();
            }
        }
    });
};