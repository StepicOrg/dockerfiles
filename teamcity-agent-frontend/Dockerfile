FROM stepik/teamcity-agent-base:2017.1.2
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV NODEJS_VERSION 6.11.2
ENV NPM_VERSION 5.3.0

# Install node.js repository
RUN curl -sL https://deb.nodesource.com/setup_6.x | bash - \
 && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install --no-install-recommends -y \
    nodejs=${NODEJS_VERSION}-1nodesource1~xenial1 bzip2 \
 && npm install -g npm@${NPM_VERSION} \
 && rm -rf /var/lib/apt/lists/* /root/.npm ~/.npm /tmp/*

RUN echo '{"interactive": false}' > $HOME/.bowerrc
