FROM stepik/teamcity-agent-base:2017.2.2
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV NODEJS_VERSION 10.6.0

# Install node.js repository
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - \
 && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install --no-install-recommends -y \
    bzip2 \
    # required for phantomjs
    libfontconfig1 \
 # Manually download and install a specific version of nodejs deb package.
 # apt-get allows to install only the latest version.
 && curl -o /tmp/nodejs.deb https://deb.nodesource.com/node_10.x/pool/main/n/nodejs/nodejs_${NODEJS_VERSION}-1nodesource1_amd64.deb \
 && apt install --no-install-recommends -y /tmp/nodejs.deb \
 && rm -f /tmp/nodejs.deb \
 && npm install -g grunt-cli \
 && rm -rf /var/lib/apt/lists/* ~/.npm ~/.config /tmp/*

# Install Chrome Stable copied from https://hub.docker.com/r/justinribeiro/chrome-headless
RUN curl -sSL https://dl.google.com/linux/linux_signing_key.pub | apt-key add - \
	&& echo "deb [arch=amd64] https://dl.google.com/linux/chrome/deb/ stable main" > /etc/apt/sources.list.d/google-chrome.list \
	&& apt-get update && apt-get install -y \
	google-chrome-stable \
	--no-install-recommends \
	&& rm -rf /var/lib/apt/lists/*

RUN echo '{"interactive": false}' > $HOME/.bowerrc
