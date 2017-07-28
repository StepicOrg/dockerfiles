FROM wikimedia/mediawiki:latest


RUN apt-get update \
    && apt-get install -y \
        wget \
        # python needs for SyntaxHighlight_GeSHi
        python3.5 \
    && ln -sf /usr/bin/python3.5 /usr/bin/python

# install SyntaxHighlight_GeSHi
RUN wget https://github.com/StepicOrg/mediawiki-extensions-SyntaxHighlight_GeSHi/archive/REL1_27.tar.gz \
    && tar -xzf REL1_27.tar.gz -C /usr/src/mediawiki/extensions/ \
    && rmdir /usr/src/mediawiki/extensions/SyntaxHighlight_GeSHi \
    && mv /usr/src/mediawiki/extensions/mediawiki-extensions-SyntaxHighlight_GeSHi-REL1_27 /usr/src/mediawiki/extensions/SyntaxHighlight_GeSHi \
    && rm REL1_27.tar.gz

# install WikiEditor
RUN wget https://extdist.wmflabs.org/dist/extensions/WikiEditor-REL1_27-952e04b.tar.gz \
    && tar -xzf WikiEditor-REL1_27-952e04b.tar.gz -C /usr/src/mediawiki/extensions \
    && rm WikiEditor-REL1_27-952e04b.tar.gz

# install CategoryTree
RUN wget https://extdist.wmflabs.org/dist/extensions/CategoryTree-REL1_28-8242603.tar.gz \
    && tar -xzf CategoryTree-REL1_28-8242603.tar.gz -C /usr/src/mediawiki/extensions \
    && rm CategoryTree-REL1_28-8242603.tar.gz

# install OpenID
RUN wget https://github.com/StepicOrg/mediawiki-extensions-OpenID/archive/REL1_27.tar.gz \
    && tar -xzf REL1_27.tar.gz -C /usr/src/mediawiki/extensions/ \
    && mv /usr/src/mediawiki/extensions/mediawiki-extensions-OpenID-REL1_27 /usr/src/mediawiki/extensions/OpenID \
    && rm REL1_27.tar.gz \
    && wget https://github.com/openid/php-openid/archive/2.3.0.tar.gz \
    && tar -xzf 2.3.0.tar.gz \
    && mv php-openid-2.3.0/Auth /usr/src/mediawiki/extensions/OpenID/Auth \
    && rm 2.3.0.tar.gz \
    && rm -rf php-openid-2.3.0

# install Math
RUN wget https://extdist.wmflabs.org/dist/extensions/Math-REL1_27-ba08a3a.tar.gz \
    && tar -xzf Math-REL1_27-ba08a3a.tar.gz -C /usr/src/mediawiki/extensions \
    && rm Math-REL1_27-ba08a3a.tar.gz

# install DeleteBatch
RUN wget https://extdist.wmflabs.org/dist/extensions/DeleteBatch-REL1_27-f6fe947.tar.gz \
    && tar -xzf DeleteBatch-REL1_27-f6fe947.tar.gz -C /usr/src/mediawiki/extensions \
    && rm DeleteBatch-REL1_27-f6fe947.tar.gz

# install Collection
RUN wget https://extdist.wmflabs.org/dist/extensions/Collection-REL1_27-b883366.tar.gz \
    && tar -xzf Collection-REL1_27-b883366.tar.gz -C /usr/src/mediawiki/extensions \
    && rm Collection-REL1_27-b883366.tar.gz

COPY CustomSettings.php /conf/
