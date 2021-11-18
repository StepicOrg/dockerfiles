FROM stepik/teamcity-agent-base:2021.2

ENV ANDROID_HOME /opt/android-sdk-linux

RUN apt-get update && apt-get install --no-install-recommends -y \
    # required to build/install fastlane
    ruby ruby-dev g++ \
 && rm -rf /var/lib/apt/lists/*

# Install Android SDK command line tools
RUN mkdir -p $ANDROID_HOME/cmdline-tools \
 && curl -o /tmp/sdk-tools-linux.zip https://dl.google.com/android/repository/commandlinetools-linux-7583922_latest.zip \
 && unzip -d $ANDROID_HOME/cmdline-tools /tmp/sdk-tools-linux.zip && rm -f /tmp/sdk-tools-linux.zip \
 && mv $ANDROID_HOME/cmdline-tools/cmdline-tools $ANDROID_HOME/cmdline-tools/latest \
 && chown -R $USER:$USER $ANDROID_HOME

# Accept all Android SDK package licenses
RUN yes | gosu $USER $ANDROID_HOME/cmdline-tools/latest/bin/sdkmanager --licenses --verbose

# Install Android SDK packages
COPY package-list.txt $ANDROID_HOME/
RUN gosu $USER $ANDROID_HOME/cmdline-tools/latest/bin/sdkmanager --package_file=$ANDROID_HOME/package-list.txt --verbose

# Install fastlane
RUN gosu $USER gem install --no-document --user-install fastlane

ENV PATH $HOME/.gem/ruby/2.7.0/bin:$PATH

USER $USER
