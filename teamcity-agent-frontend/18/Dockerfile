FROM stepik/teamcity-agent-base:2021.2.1

ENV NODEJS_VERSION 18.14.2

RUN apt-get update && apt-get install --no-install-recommends -y \
    bzip2 \
    gnupg \
    python3-venv \
    # begin Cypress dependencies
    # copied from https://github.com/cypress-io/cypress-docker-images/blob/master/base/14.18.1/Dockerfile
    libgtk2.0-0 \
    libgtk-3-0 \
    libnotify-dev \
    libgconf-2-4 \
    libgbm-dev \
    libnss3 \
    libxss1 \
    libasound2 \
    libxtst6 \
    xauth \
    xvfb \
    # install emoji font
    fonts-noto-color-emoji \
    # install Chinese fonts
    # this list was copied from https://github.com/jim3ma/docker-leanote
    fonts-arphic-bkai00mp \
    fonts-arphic-bsmi00lp \
    fonts-arphic-gbsn00lp \
    fonts-arphic-gkai00mp \
    fonts-arphic-ukai \
    fonts-arphic-uming \
    ttf-wqy-zenhei \
    ttf-wqy-microhei \
    xfonts-wqy \
    # end Cypress dependencies
 # Install node.js repository
 && curl -s https://deb.nodesource.com/gpgkey/nodesource.gpg.key | apt-key add - \
 && echo "deb https://deb.nodesource.com/node_18.x focal main" > /etc/apt/sources.list.d/nodesource.list \
 && apt-get update && apt-get install --no-install-recommends -y \
    nodejs=${NODEJS_VERSION}-deb-1nodesource1 \
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

USER $USER

# Create python venv and install yamllint
RUN python3 -m venv $HOME/.venv \
    && $HOME/.venv/bin/pip install -U pip \
    && $HOME/.venv/bin/pip install yamllint==1.20.0

ENV PATH $HOME/.venv/bin:$PATH
